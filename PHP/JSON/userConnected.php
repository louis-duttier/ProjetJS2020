<?php

session_start();

$obj = new stdClass();
$obj->message = "Connectez-vous avant de pouvoir voir la description des séries";

if (isset($_SESSION['user'])) {
    $obj->success = true;
    $obj->message = "";
    if ($_SESSION['justLogged']) {
        unset($_SESSION['justLogged']);
        $obj->message = "Bonjour " . $_SESSION['user'] . " !";
    }
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);