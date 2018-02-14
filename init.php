
<?php 
	ob_start();
	//Importing All Controllers
    require_once 'classes/controllers/DB.php';
    require_once 'classes/controllers/GossipsController.php';
    require_once 'classes/controllers/CommentsController.php';
    require_once 'classes/controllers/Locations.php';
    require_once 'classes/controllers/Logger.php';
    require_once 'classes/controllers/Section_Suggestor.php';
    require_once 'classes/controllers/API_Digestor.php';
    require_once 'classes/controllers/general.php';

	//Importing All Models
    require_once 'classes/models/GossipsModel.php';
    require_once 'classes/models/CommentModel.php';
    require_once 'classes/models/Section_SuggestorModel.php';
    require_once 'classes/models/LocationModel.php';

    // Instantiating All Controllers
    $db = DB::getInstance();
    $gossipController = GossipsController::getInstance();
    $commentController = CommentsController::getInstance();
    $locationController = Locations::getInstance();
    $loggerController = Logger::getInstance();
    $sectionSuggestorController = Section_Suggestor::getInstance();
    $APIDigestorController = API_Digestor::getInstance();

    // Instantiating All Models
    $gossipModel = GossipsModel::getInstance();
    $commentModel = CommentModel::getInstance();
    $section_suggestorModel = Section_SuggestorModel::getInstance();
    $locationModel = LocationModel::getInstance();

    // declaring a database connection
    $dbcon = $db->getConnection();
?>