<?php

require_once '../BaseDeDonnees/DataP.php';
require_once '../BaseDeDonnees/DataBase.php';
session_start();

$obj = new stdClass();
$obj -> success = false;

$db = new DataBase();

$user = $_POST['username'];
$pwd = $_POST['password'];
$mail = $_POST['mail'];

if (empty($user) || empty($pwd) || empty($mail) ) {
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    exit();
}

$stmt = "SELECT * 
         FROM ACCOUNT 
         WHERE MAIL = '$mail'";
$mailTaken = $db->pdo()->query($stmt)->rowCount();

$stmt = "SELECT * 
         FROM ACCOUNT 
         WHERE USERNAME = '$user'";
$usrTaken = $db->pdo()->query($stmt)->rowCount();

if($mailTaken) {
    $obj -> mailChecks[] = "This e-mail address already exist.";
    $obj -> message = "Can't registered you, please try again";

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    die();
}
if(!preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $mail)) {
    $obj -> mailChecks[] = "Incorrect format for your e-mail.";
}

if($usrTaken) {
    $obj -> usrChecks[] = "Username already taken.";
    $obj -> message = "Can't registered you, please try again";

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    die();
}
if(!preg_match('/.{8,}/', $user)) {
    $obj -> usrChecks[] = "Username must be at least 8 characters long.";
} else if(!preg_match('/.{8,20}/', $user)) {
    $obj -> usrChecks[] = "Less than 20 characters long for username please.";
}

if(!preg_match('/.*[A-Z].*/', $pwd)) {
    $obj -> pwdChecks[] = "Password must contain at least one uppercase letter.";
}

// TODO : Trouver une regex plus acceptable pour les caractères spéciaux.
if(!preg_match('/.*[\(\)\{\}\!\@\#\$\€\£\&\*\+\-\;\,\:\.].*/', $pwd)) {
    $obj -> pwdChecks[] = "Password must contain at least one special character." ;
}

if(!preg_match('/.{8,}/', $pwd)) {
    $obj -> pwdChecks[] = "Password must be at least 8 characters long.";
}

if (!isset($obj -> pwdChecks) && !isset($obj -> usrChecks) && !isset($obj -> mailChecks)) {
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    try {
        $stmt = $db
            -> pdo()
            -> prepare("INSERT INTO ACCOUNT VALUES (?, ?, ?, NOW(), FALSE)")
            -> execute([
                $user,
                $pwd,
                $mail
            ]);
        $obj -> success = true;
        $obj -> message = 'Success !';
        $_SESSION['user'] = $user;
        $_SESSION['justLogged'] = true;
    } catch (mysqli_sql_exception $e) {
        $obj -> message = $e -> getMessage();
    }
} else {
    $obj -> message = "Couldn't process registration.";
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);