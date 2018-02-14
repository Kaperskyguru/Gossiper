<?php

class Section_Suggestor {

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
   
    function addSuggested_Section(Section_SuggestorModel $model) {
        global $dbh;
        try{
            $suggestion_title = $model->getSuggestion_title();
            $state_id = $model->getSuggestion_location();

            $insertSql = "INSERT INTO Suggestions(title,state_id)VALUES(:title,:state_id)";
            $stmt = $this->dbh->prepare($insertSql);
            $stmt->execute(array(':title' =>$suggestion_title, ':state_id' =>$state_id));
            if ($stmt) {
                
            }
        }catch(PDOException $e){
            //log it here
            echo $e->getMessage();
        }
    }

}
