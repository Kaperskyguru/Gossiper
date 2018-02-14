<?php

class CommentsController {

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

    public function getComments() {
        $sql = "SELECT * FROM comments";
        $stmt = $this->db->execQuery($sql);
        return $stmt;
    }

    public function getCommentsByPostID($id) {
        $sql = "SELECT * FROM comments WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        return $stmt;
    }

    public function getCommentsBody($id) {
        $content = '';
        $sql = "SELECT comment_body FROM comments WHERE comment_id = '$id'";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $content = $row["comment_body"];
        }
        return $content;
    }

    public function getReplyCount($id) {
        $replies = '';
        $sql = "SELECT comment_thread FROM comments WHERE comment_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $replies = $row["comment_thread"];
        }
        return $replies;
    }

    public function getCommentLikeCount($id) {
        $likes = '';
        $sql = "SELECT comment_like FROM comments WHERE comment_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $likes = $row["comment_like"];
        }
        return $likes;
    }

    public function getCommentsDislikeCount($id) {
        $dislikes = '';
        $sql = "SELECT comment_dislike FROM comments WHERE comment_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $dislikes = $row["comment_dislike"];
        }
        return $dislikes;
    }

    public function getCommentsTags() {
        
    }

    public function getCommentsPostDate($id) {
        $date = '';
        $sql = "SELECT comment_post_date FROM comments WHERE comment_id = '$id'";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $date = $row["comment_post_date"];
        }
        return $date;
    }

    public function getCommentsHeartCount($id) {
        $heart = '';
        $sql = "SELECT comment_heart FROM comments WHERE comment_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $heart = $row["comment_heart"];
        }
        return $heart;
    }

    function addComment(CommentModel $model) {
        $post_content = $model->getComment_body();
        $Post_id = $model->getComment_post_id();
        $insertSql = "INSERT INTO comments(post_id,comment_body)VALUES ($Post_id,$post_content)";
        $stmt = $this->db->execQuery($insertSql);
        if ($stmt) {
            
        }
    }

    function incrementCommentLikes(CommentModel $model, $id) {
        $post_like = $model->getComment_like();
        $previous_likes = $this->getCommentLikeCount($id);
        $previous_likes += $post_like;
        $insertSql = "INSERT INTO posts(post_like)VALUES ($previous_likes)";
        $stmt = $this->db->execQuery($insertSql);
        if ($stmt) {
            
        }
    }

    function incrementCommentDisLikes(CommentModel $model, $id) {
        $post_dislike = $model->getComment_dislike();
        $previous_dislikes = $this->getCommentsDislikeCount($id);
        $previous_dislikes += $post_dislike;
        $insertSql = "INSERT INTO comments(post_disklike)VALUES ($previous_dislikes)";
        $stmt = $this->db->execQuery($insertSql);
        if ($stmt) {
            
        }
    }

    function incrementCommentHeart(CommentModel $model, $id) {
        $post_heart = $model->getComment_heart();
        $previous_heart = $this->getCommentsHeartCount($id);
        $previous_heart += $post_heart;

        // Y not use update instead of Insert
        $insertSql = "INSERT INTO comments(post_disklike)VALUES ($previous_heart)";
        $stmt = $this->db->execQuery($insertSql);
        if ($stmt) {
            
        }
    }


    function addComments(CommentModel $model) {
        global $dbh;
        echo "hahahahahahahahahahahahahahahahah";
        try{
            $comment_body = $model->getComment_body();
            $post_id = $model->getComment_post_id();

            $insertSql = "INSERT INTO comments(comment_body,post_id)VALUES(:comment_body,:post_id)";
            $stmt = $this->dbh->prepare($insertSql);
            $stmt->execute(array(':comment_body' =>$comment_body, ':post_id' =>$post_id));
        
            //$stmt = $this->db->execQuery($insertSql);
            if ($stmt) {
                
            }
        }catch(PDOException $e){
            //log it here
            echo $e->getMessage();
        }
    }


}
