<?php

require_once '../dataBase.php';
session_start();

$obj = new stdClass();
$obj->success = false;

$db = new dataBase();

$usr = $_POST['username'];
$pwd = $_POST['password'];
$mail = $_POST['email'];

if (empty($usr) || empty($pwd) || empty($mail)) {
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 0USE5:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    exit();
}

$stmt = "SELECT * FROM ACCOUNT WHERE MAIL = '$mail'";
$mailTaken = $db->pdo()->query($stmt)->rowCount();

$stmt = "SELECT * FROM ACCOUNT WHERE USERNAME = '$usr'";
$usrTaken = $db->pdo()->query($stmt)->rowCount();

if ($mailTaken) {
    $obj->mailChecks[] = "E-Mail déjà existant !";
    $obj->msg = "Impossible de vous enregistrer.";

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    die();
}
if (!preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $mail)) {
    $obj->mailChecks[] = "Vous avez mal écrit votre adresse mail.";
}

if ($usrTaken) {
    $obj->usrChecks[] = "Pseudonyme déjà existant !";
    $obj->msg = "Impossible de vous enregistrer.";

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    die();
}
if (!preg_match('/.{3,}/', $usr)) {
    $obj->usrChecks[] = "Votre pseudonyme doit contenir au moins 3 caractères.";
} else if (!preg_match('/.{3,20}/', $usr)) {
    $obj->usrChecks[] = "Votre pseudonyme ne doit pas dépasser 20 caractères.";
}

if (!preg_match('/.{8,}/', $pwd)) {
    $obj->pwdChecks[] = "Votre mot de passe doit contenir au moins 8 caractères.";
}

if (!preg_match('/.*[A-Z].*/', $pwd)) {
    $obj->pwdChecks[] = "Votre mot de passe doit contenir au moins une majuscule.";
}

if (!preg_match('/.*[^A-Za-z0-9].*/', $pwd)) {
    $obj->pwdChecks[] = "Votre mot de passe doit contenir au moins deux caractère spécial.";
}

if (!isset($obj->pwdChecks) && !isset($obj->usrChecks) && !isset($obj->mailChecks)) {
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    try {
        $stmt = $db
            ->pdo()
            ->prepare("INSERT INTO ACCOUNT (MAIL, USERNAME,PASSWORD) VALUES (?,?,?)")
            ->execute([
                $mail,
                $usr,
                $pwd
            ]);
        $obj->success = true;
        $obj->msg = 'Inscription réussite !';
        $_SESSION['user'] = $usr;
    } catch (mysqli_sql_exception $e) {
        $obj->msg = $e->getMessage();
    }
} else {
    $obj->msg = "Impossible de vous enregistrer.";
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);