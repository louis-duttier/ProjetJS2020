<?php

class dataBase {
    private $pdo;

    public function __construct() {

        $hst = "mysql-resumes.alwaysdata.net";
        $charset = "utf-8";
        $db = "resumes_database";
        $user = "resumes";
        $pwd = "Lalm83220";

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
