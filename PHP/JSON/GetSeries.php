<?php


require_once '../php/Database.php';
session_start();

$obj = new stdClass();

$db = new Database();

$stmt = $db->pdo()->query("SELECT IMG, TITLE, DESCP FROM SERIES");
foreach ($stmt as $row) {
    $stmt -> execute([$row['ID']]);
    $rate = $stmt->fetch()['RATE'];
    $obj -> series[] = array(
        "img" => $row['IMG'],
        "title" => $row['TITLE'],
        "descp" => $row['DESCP']

    );
}