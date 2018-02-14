<?php
class Section_SuggestorModel {
    private static $instance;
    private $Suggestion_id;
    private $Suggestion_title;
    private $Suggestion_location;

    function __construct() {
        
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

   private function __clone() {}
   
    public function setSuggestion_id($Suggestion_id) {
        $this->Suggestion_id = $Suggestion_id;
    }

    public function setSuggestion_title($Suggestion_title) {
        $this->Suggestion_title = $Suggestion_title;
    }

    public function setSuggestion_location($Suggestion_location) {
        $this->Suggestion_location = $Suggestion_location;
    }

    public function getSuggestion_id() {
        return $this->Suggestion_id;
    }

    public function getSuggestion_title() {
        return $this->Suggestion_title;
    }

    public function getSuggestion_location() {
        return $this->Suggestion_location;
    }

}
