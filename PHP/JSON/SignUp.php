<?php

require_once '../BaseDeDonnees/DataBase.php';
session_start();

$obj = new stdClass();
$obj -> success = false;

$db = new Database();

$user = $_POST['username'];
$passwd = $_POST['password'];
$mail = $_POST['mail'];

if (empty($user) || empty($passwd) || empty($mail) ) {
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    exit();
}

$stmt = "SELECT * 
         FROM USER 
         WHERE MAIL = '$mail'";
$mailTaken = $db->pd()->query($stmt)->rowCount();

$stmt = "SELECT * 
         FROM USER 
         WHERE USERNAME = '$user'";
$usrTaken = $db->pd()->query($stmt)->rowCount();

if($mailTaken) {
    $obj -> mailChecks[] = "This e-mail address already exist.";
    $obj -> message = "Couldn't process registration";

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    die();
}
if(!preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $mail)) {
    $obj -> mailChecks[] = "Your e-mail is in incorrect format.";
}

if($usrTaken) {
    $obj -> usrChecks[] = "This username is already taken.";
    $obj -> message = "Couldn't process registration";

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode($obj);
    die();
}
if(!preg_match('/.{3,}/', $user)) {
    $obj -> usrChecks[] = "Username must be at least 3 characters long.";
} else if(!preg_match('/.{3,20}/', $user)) {
    $obj -> usrChecks[] = "Username must be less than 20 characters long.";
}


if(!preg_match('/.*[A-Z].*/', $passwd)) {
    $obj -> pwdChecks[] = "Password must contain at least one uppercase letter.";
}

// TODO : Trouver une regex plus acceptable pour les caractères spéciaux.
if(!preg_match('/.*[\(\)\{\}\!\@\#\$\€\£\&\*\+\-\;\,\:\.].*/', $passwd)) {
    $obj -> pwdChecks[] = "Password must contain at least one special character." ;
}

if(!preg_match('/.{8,}/', $passwd)) {
    $obj -> pwdChecks[] = "Password must be at least 8 characters long.";
}

if (!isset($obj -> pwdChecks) && !isset($obj -> usrChecks) && !isset($obj -> mailChecks)) {
    $pwd = password_hash($passwd, PASSWORD_DEFAULT);
    try {
        $stmt = $db
            -> pd()
            -> prepare("INSERT INTO USR VALUES (?, ?, ?, NOW(), FALSE)")
            -> execute([
                $user,
                $passwd,
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