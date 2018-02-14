<?php

class API_Digestor {

    private static $instance;
    private $dbh;

    function __construct() {
        $db = DB::getInstance();
        $this->dbh = $db->getConnection();
    }

    public function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

       private function __clone() {}

}
