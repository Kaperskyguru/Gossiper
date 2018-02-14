<?php

class DB {

    private $dbhost = 'localhost';
    private $dbname = 'letsgossip';
    private $dbuser = 'root';
    private $dbpass = '';
    private $dbcon;
    private $stmt;
    private static $_instance;

    function __construct() {
        try {

            $this->dbcon = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
            $this->dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    private function __clone() {}

    public static function getInstance() {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getConnection() {
        return $this->dbcon;
    }

    public function execQuery($statement) {
        try {
            $connection = $this->dbcon;
            $stmt = $connection->prepare($statement);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
