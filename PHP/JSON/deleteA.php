<?php

require_once '../dataBase.php';
session_start();

$obj = new stdClass();
$obj->success = false;

$db = new dataBase();

$who = $_SESSION['user'];
$obj->who = $who;

$stmt = $db->pdo()->prepare("DELETE FROM ACCOUNT WHERE USERNAME = ?");
$stmt->execute([$who]);
if ($stmt->rowCount()) {
    if ($stmt->rowCount()) {
        $obj->success = true;
        $_SESSION['deleted'] = "Compte supprimé !";
    } else {
        $obj->message = "Impossible de supprimer votre compte.";
    }
} else {
    $obj->message = "Impossible de supprimer votre compte.";
}

unset($_GET);

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);