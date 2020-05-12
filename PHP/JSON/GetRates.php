<?php

require ('config.php');

$obj = new stdClass();
$obj->note = 0;

$db = new dataBase();

$stmt = $db->pdo()->prepare("SELECT AVG(NOTE) AS MOY FROM NOTES WHERE ID = ?");
$stmt->execute([$_GET['ID']]);

$obj->note = number_format($stmt->fetch()['MOY'], 2);

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);
