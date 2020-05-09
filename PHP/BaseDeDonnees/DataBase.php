<?php

require_once 'DataP.php';

class DataBase {
    private $pdo;

    public function __construct() {

        $data = new DataP();
        $data = $data->data()['db'];

        $hst = $data['server'];
        $charset = $data['charset'];
        $db = $data['name'];
        $user = $data['username'];
        $pwd = $data['password'];

        $dsn = 'mysql:host=' . $hst . ';dbname=' . $db . ';charset=' . $charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pwd, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());

        }
    }

    public function pdo() {
        return $this->pdo;
    }
}
