<?php


require_once 'DataPrincipal.php';
class DataBase
{
    private $pd;

    public function __construct() {
        $data = new Data();
        $data = $data->data()['db'];

        $hst = $data['server'];
        $charset = $data['charset'];
        $db = $data['name'];
        $user = $data['username'];
        $pwd = $data['password'];

        $dsn = 'mysql:host='. $hst . ';dbname='. $db . ';charset='. $charset;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pd = new PDO($dsn, $user, $pwd, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function pd () {
        return $this->pd;
    }
}