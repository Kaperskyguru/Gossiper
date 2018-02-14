<?php
class LocationModel {
    private static $instance;
    private $loc_id;
    private $state;

    function __construct() {
        
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

   private function __clone() {}
   
    public function setLoc_id($Loc_id) {
        $this->loc_id = $Loc_id;
    }

    public function setState($State) {
        $this->state = $State;
    }

    public function getLoc_id() {
        return $this->loc_id;
    }

    public function getState() {
        return $this->state;
    }

}
