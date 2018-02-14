<?php

class Locations {

    private static $instance;
    private $dbh, $db;

    function __construct() {
        $this->db = DB::getInstance();
        $this->dbh = $this->db->getConnection();
    }

    public function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

       private function __clone() {}

    public function getLocations() {
        try {
            $sql = "SELECT * FROM location";
            $stmt = $this->db->execQuery($sql);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getLocationIDByState(LocationModel $model) {
        $state = $model->getState();
        $location = '';
        $sql = "SELECT loc_id FROM location WHERE state = :state";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(":state", $state, PDO::PARAM_STR);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $location = $loc_id;
        }
        return $location;
    }

    public function getlocationID() {
        $location = '';
        $sql = "SELECT loc_id FROM location";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $location = $row["loc_id"];
        }
        return $location;
    }

    public function getStateByID(LocationModel $model) {
        $id = $model->getLoc_id();
        $location = '';
        $sql = "SELECT state FROM location WHERE loc_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $location = $row["state"];
        }
        return $location;
    }

}
