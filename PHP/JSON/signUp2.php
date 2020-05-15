<?php


require_once '../dataBase.php';
session_start();


$obj = new stdClass();
$obj -> success = false;

$db = new dataBase();

$usr = $_POST['USERNAME'];
$pwd = $_POST['PASSWORD'];
$mail = $_POST['MAIL'];

if (empty($usr) || empty($pwd) || empty($mail) ) {
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    exit();
}

$stmt = "SELECT * FROM ACCOUNT WHERE MAIL = '$mail'";
$mailTaken = $db->pdo()->query($stmt)->rowCount();

$stmt = "SELECT * FROM ACCOUNT WHERE USERNAME = '$usr'";
$usrTaken = $db->pdo()->query($stmt)->rowCount();

if($mailTaken) {
    $obj -> mailChecks[] = "E-Mail déjà existant !";
    $obj -> message = "Impossible de vous enregistrer.";

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    die();
}
if(!preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $mail)) {
    $obj -> mailChecks[] = "Vous avez mal écrit(e) votre adresse mail.";
}

if($usrTaken) {
    $obj -> usrChecks[] = "Pseudo déjà existant !";
    $obj -> message = "Impossible de vous enregistrer.";

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    die();
}
if(!preg_match('/.{3,}/', $usr)) {
    $obj -> usrChecks[] = "Votre pseudonyme doit contenir au moins 3 caractères.";
} else if(!preg_match('/.{3,20}/', $usr)) {
    $obj -> usrChecks[] = "Votre pseudonyme ne doit pas dépasser 20 caractères.";
}


if(!preg_match('/.*[A-Z].*/', $pwd)) {
    $obj -> pwdChecks[] = "Votre mot de passe doit contenir au moins une majuscule.";
}

// TODO : Trouver une regex plus acceptable pour les caractères spéciaux.
if(!preg_match('/.*[\(\)\{\}\!\@\#\$\€\£\&\*\+\-\;\,\:\.].*/', $pwd)) {
    $obj -> pwdChecks[] = "Votre mot de passe doit contenir au moins une caractère spécial." ;
}

if(!preg_match('/.{8,}/', $pwd)) {
    $obj -> pwdChecks[] = "Votre mot de passe doit contenir au moins 8 caractères.";
}

if (!isset($obj -> pwdChecks) && !isset($obj -> usrChecks) && !isset($obj -> mailChecks)) {
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    try {
        $stmt = $db
            -> pdo()
            -> prepare("INSERT INTO ACCOUNT VALUES (?, ?, ?, NOW(), FALSE)")
            -> execute([
                $usr,
                $pwd,
                $mail
            ]);
        $obj -> success = true;
        $obj -> message = 'Inscription réussite !';
        $_SESSION['user'] = $usr;
        $_SESSION['justLogged'] = true;
    } catch (mysqli_sql_exception $e) {
        $obj -> message = $e -> getMessage();
    }
} else {
    $obj -> message = "Impossible de vous enregistrer.";
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);