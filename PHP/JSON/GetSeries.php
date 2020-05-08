<?php


require_once '../BaseDeDonnees/DataBase.php';
session_start();

$obj = new stdClass();

$db = new Database();

$stmt = $db->pd()->query("SELECT IMG, TITLE, DESCP FROM SERIES");
foreach ($stmt as $row) {
    $stmt -> execute([$row['ID']]);
    $rate = $stmt->fetch()['RATE'];
    $obj -> series[] = array(
        "img" => $row['IMG'],
        "title" => $row['TITLE'],
        "descp" => $row['DESCP']

    );
}