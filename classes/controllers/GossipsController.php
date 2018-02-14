<?php

class GossipsController {

    private static $instance;
    private $dbh;
    private $db;

    private function __construct() {
        $this->db = DB::getInstance();
        $this->dbh = $this->db->getConnection();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

   private function __clone() {}

    public function getGossips() {
        try {
            $sql = "SELECT * FROM posts";
            $stmt = $this->db->execQuery($sql);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getGossipsByID(GossipsModel $model) {
        try {
            $id = $model->getPost_id();
            $sql = "SELECT * FROM posts WHERE post_id = $id";
            $stmt = $this->db->execQuery($sql);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getPinnedGossips()
    {
        try {
            $sql = "SELECT * FROM posts WHERE post_pin = 1";
            $stmt = $this->db->execQuery($sql);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getGossipTitleByID($id) {
        $title = '';
        $sql = "SELECT post_title FROM posts WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $title = $row["post_title"];
        }
        return $title;
    }

    public function getGossipBodyByID($id) {
        $title = '';
        $sql = "SELECT post_content FROM posts WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $title = $row["post_content"];
        }
        return $title;
    }

    public function getGossipCommentCount($id) {
        $comments = '';
        $sql = "SELECT post_comments FROM posts WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $comments = $row["post_comments"];
        }
        return $comments;
    }

    public function getGossipLikeCount($id) {
        $likes = '';
        $sql = "SELECT post_like FROM posts WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $likes = $row["post_like"];
        }
        return $likes;
    }

    public function getGossipDislikeCount($id) {
        $dislikes = '';
        $sql = "SELECT post_dislike FROM posts WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $dislikes = $row["post_dislike"];
        }
        return $dislikes;
    }

    public function getGossipTags($id) {
        $tag = '';
        $sql = "SELECT post_tag FROM posts WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tag = $row["post_tag"];
        }
        return $row;
    }

    public function getGossipPostDate($id) {
        $date = '';
        $sql = "SELECT post_date FROM posts WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $date = $row["post_date"];
        }
        return $date;
    }

    public function getGossipHeartCount($id) {
        $heart = '';
        $sql = "SELECT post_heart FROM posts WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $heart = $row["post_heart"];
        }
        return $heart;
    }

    public function getGossipExcerpt($id, $length) {
        $content = $this->getGossipBodyByID($id);
        if (strlen($content) < $length) {
            return $content;
        } else {
            $content = substr($content, 0, $length);
            return $content . ' ...';
        }
    }

    public function addGossip(GossipsModel $model) {
        try{
            $post_title = $model->getPost_title();
            $post_content = $model->getPost_content();
            $loc_id = $model->getLoc_id();
            $image_url = $model->getPost_image();

            if (is_null($post_title) && is_null($post_content) && is_null($image_url) && is_null($loc_id)) {
                // Log error here
            }else{
                $insertSql = "INSERT INTO posts(post_title,loc_id,post_content)VALUES(:post_title,:loc_id,:post_content)";
                $stmt = $this->dbh->prepare($insertSql);
                $stmt->execute(array(':post_title' =>$post_title, ':loc_id' =>$loc_id, ':post_content' =>$post_content));

                $post_id = $this->dbh->lastInsertId();

                $this->insertImageURL1($image_url, $post_id);
            }
        }catch(PDOException $e){
            //log it here
            echo $e->getMessage();
        }
    }

    public function insertImageURL1($image_url, $post_id){
        $insertSql = "INSERT INTO images(post_id, image_url)VALUES(:post_id,:image_url)";
        $stmt = $this->dbh->prepare($insertSql);
        $stmt->execute(array(':post_id' =>$post_id, ':image_url' =>$image_url));
        
    }


    public function incrementLikes(GossipsModel $model) {
        $id = $model->getPost_id();
        $post_like = $model->getPost_like();
        $previous_likes = intval($this->getGossipLikeCount($id));

        if (!is_null($previous_likes) && !is_null($post_like)) {

            $previous_likes = $previous_likes + $post_like;
            $insertSql = "UPDATE posts SET post_like = :previous_likes WHERE post_id = $id";
            $stmt = $this->dbh->prepare($insertSql);
            $stmt->bindParam(':previous_likes', $previous_likes, PDO::PARAM_INT);
            $stmt->execute();
            return $previous_likes;
        }
        
    }

    function incrementDisLikes(GossipsModel $model) {
        $id = $model->getPost_id();
        $post_dislike = $model->getPost_disklike();
        $previous_dislikes = intval($this->getGossipDislikeCount($id));

        if (!is_null($post_dislike) && !is_null($previous_dislikes)) {
            $previous_dislikes += $post_dislike; 

            $insertSql = "UPDATE posts SET post_dislike = :previous_dislikes WHERE post_id = $id";
            $stmt = $this->dbh->prepare($insertSql);
            $stmt->bindParam(':previous_dislikes', $previous_dislikes, PDO::PARAM_INT);
            $stmt->execute();
            return $previous_dislikes;
        }
    }

    function incrementHeart(GossipsModel $model) {
        $id = $model->getPost_id();
        $post_heart = $model->getPost_heart();
        $previous_heart = intval($this->getGossipHeartCount($id));

         if (!is_null($post_heart) && !is_null($previous_heart)) {
            $previous_heart += $post_heart;
            
            $insertSql = "UPDATE posts SET post_heart = :previous_heart WHERE post_id = $id";
            $stmt = $this->dbh->prepare($insertSql);
            $stmt->bindParam(':previous_heart', $previous_heart, PDO::PARAM_INT);
            $stmt->execute();
            return $previous_heart;
        }
    }

    function incrementComment(GossipsModel $model) {
        $post_comment = $model->getPost_comment();
        $id = $model->getPost_id();
        $previous_comment = intval($this->getGossipCommentCount($id));

        if (!is_null($post_comment) && !is_null($previous_comment)) {
            $previous_comment = $previous_comment + $post_comment;
            $insertSql = "UPDATE posts SET post_comments = :previous_comment WHERE post_id = $id";
            $stmt = $this->dbh->prepare($insertSql);
            $stmt->bindParam(':previous_comment', $previous_comment, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function getGossipImageByPostID($id)
    {
        $image_url = '';
        $sql = "SELECT image_url FROM images WHERE post_id = $id";
        $stmt = $this->db->execQuery($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $image_url = $row["image_url"];
            return $image_url;
        }
        return null;
    }

}
