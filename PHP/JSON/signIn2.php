<?php

require_once '../dataBase.php';
session_start();

$obj = new stdClass();
$obj -> success = false;
$obj -> message = "Vérifiez vos informations, impossible de nous connecter !";

$db = new DataBase();
$stmt = $db->pdo()->prepare(
    "SELECT * ".
    "FROM ACCOUNT " .
    "WHERE USERNAME = BINARY ?");
$stmt->execute([$_POST['username']]);

foreach ($stmt as $row) {
    if (password_verify($_POST['pwd'], $row['PASSWORD'])) {
        $obj->success = true;
        $obj->message = "Bienvenue sur ResumeS" . $_POST['username'] . " !";
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['justLogged'] = true;
        break;
    }
}