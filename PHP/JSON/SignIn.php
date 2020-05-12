<?php

require_once '../BaseDeD/dataBase.php';
session_start();

$obj = new stdClass();
$obj->success = false;
$obj->message = "Please verify what you writing, can't log you in";

$db = new dataBase();
$stmt = $db->pdo()->prepare(
    "SELECT * " .
    "FROM ACCOUNT " .
    "WHERE USERNAME = BINARY ?");
$stmt->execute([$_POST['username']]);

function stock($stmt) {
    return $stmt;
}

foreach ($stmt as $row) {
    if (password_verify($_POST['pwd'], $row['PASSWORD'])) {
        $obj->success = true;
        $obj->message = "Welcome to resumeS " . $_POST['username'] . " !";
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['justLogged'] = true;
        break;
    }
}

echo json_encode($obj);