<?php

require_once '../dataBase.php';
session_start();

$obj = new stdClass();
$obj->success = false;
$obj->message = "Veuillez vérifiez vos informations, impossible de vous connectez !";

$db = new dataBase();
$stmt = $db->pdo()->prepare(
    "SELECT * " .
    "FROM ACCOUNT " .
    "WHERE USERNAME = BINARY ?");
$stmt->execute([$_POST['username']]);

foreach ($stmt as $row) {
    if (password_verify($_POST['password'], $row['PASSWORD'])) {
        $obj->success = true;
        $obj->message = "Bienvenue sur ResumeS" . $_POST['username'] . " !";
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['justLogged'] = true;
        break;
    }
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);