<?php 
require_once 'init.php';

//$GossipsController = GossipsController::getInstance();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['SuggestTitle'])){
    $suggest_title = $_POST['SuggestTitle'];
    $suggest_location = $_POST['SuggestLocation'];

    if(!empty($suggest_title) && !empty($suggest_location)){

            $locationModel->setState($suggest_location);

            $section_suggestorModel->setSuggestion_title($suggest_title);
            $section_suggestorModel->setSuggestion_location($locationController->getLocationIDByState($locationModel));
           
            $sectionSuggestorController->addSuggested_Section($section_suggestorModel);

            header("location: index.php");
    }else{
    	header("location: index.php");
    }
}


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commentBox'])){
    $comment_title = $_POST['commentBox'];
    $post_id = $_POST['d'];

    if(!empty($comment_title) && !empty($post_id)){  
    	    
    		// Addong New Comment
            $commentModel->setComment_body($comment_title);
           	$commentModel->setPost_id($post_id);
            $commentController->addComments($commentModel);

            //Incrementing the comment count
            $gossipModel->setPost_comment(1);
            $gossipModel->setGossipPost_id($post_id);
            $gossipController->incrementComment($gossipModel);

            //Redirecting to the same page
            header("location: viewPost.php?id=$post_id");
    }else{
    	header("location: viewPost.php?id=$post_id");
    }
}

if(isset($_POST['setLike'])){
	$post_id = $_POST['post_id'];
	
    $gossipModel->setPost_like(1);
    $gossipModel->setGossipPost_id($post_id);
    $current_like = $gossipController->incrementLikes($gossipModel);
    echo $current_like ;
}

if(isset($_POST['setDislike'])){
	$post_id = $_POST['post_id'];
	
    $gossipModel->setPost_dislike(1);
    $gossipModel->setGossipPost_id($post_id);
    $current_like = $gossipController->incrementDislikes($gossipModel);
    echo $current_like ;
}

if(isset($_POST['setHeart'])){
	$post_id = $_POST['post_id'];
	
    $gossipModel->setPost_heart(1);
    $gossipModel->setGossipPost_id($post_id);
    $current_like = $gossipController->incrementHeart($gossipModel);
    echo $current_like ;
}
