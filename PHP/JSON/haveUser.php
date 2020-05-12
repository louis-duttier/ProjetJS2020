<?php


require_once '../BaseDeD/dataBase.php';
session_start();

$obj = new stdClass();

$db = new dataBase();

$stmt = $db->pdo()->prepare("SELECT USERNAME FROM ACCOUNT WHERE USERNAME != ?");
$stmt->execute([$_SESSION['user']]);

foreach ($stmt as $row) {
    $obj -> users[] = array(
        "name" => $row['USERNAME'],
        "date" =>
            substr($row['SIGN_UP_DATE'], -2) . '/' .
            substr($row['SIGN_UP_DATE'], 5, 2) . '/' .
            substr($row['SIGN_UP_DATE'], 0, 4)
    );
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);
