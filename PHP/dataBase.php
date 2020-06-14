<?php

class dataBase
{
    private $pdo;

    public function __construct()
    {

        $dsn = "mysql:dbname=resumes_database;host=mysql-resumes.alwaysdata.net:3306";
        $user = "resumes";
        $pwd = "Lalm83220";

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

    public function pdo()
    {
        return $this->pdo;
    }
}