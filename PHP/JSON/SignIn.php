<?php

require_once '../BaseDeDonnees/DataBase.php';
session_start();

$obj = new stdClass();
$obj -> success = false;
$obj -> message = "Please verify what you writing, can't log you in";

$db = new Database();
$stmt = $db->pd()->prepare(
            "SELECT * ".
            "FROM USR " .
            "WHERE USERNAME = BINARY ?");
$stmt->execute([$_POST['username']]);

foreach ($stmt as $row) {
    if (password_verify($_POST['passwd'], $row['PASSWORD'])) {
        $obj->success = true;
        $obj->message = "Welcome to resumeS " . $_POST['username'] . " !";
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['justLogged'] = true;
        break;
    }
}

echo json_encode($obj);