<?php

class CommentModel {

    private static $instance;
    private $comment_id;
    private $comment_body;
    private $comment_like;
    private $comment_dislike;
    private $comment_heart;
    private $comment_post_date;
    private $post_id;
    private $comment_thread;

    function __construct() {
        
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

       private function __clone() {}

    public function setComment_id($comment_id) {
        $this->comment_id = $comment_id;
    }

    public function setComment_body($comment_body) {
        $this->comment_body = $comment_body;
    }

    public function setComment_like($comment_like) {
        $this->comment_like = $comment_like;
    }

    public function setComment_dislike($comment_dislike) {
        $this->comment_dislike = $comment_dislike;
    }

    public function setPComment_thread($comment_thread) {
        $this->comment_thread = $comment_thread;
    }

    public function setComment_post_date($comment_date) {
        $this->comment_post_date = $comment_date;
    }

    public function setComment_heart($comment_heart) {
        $this->comment_heart = $comment_heart;
    }

    public function setPost_id($post_id) {
        $this->post_id = $post_id;
    }

    public function getComment_id() {
        return $this->comment_id;
    }

    public function getComment_body() {
        return $this->comment_body;
    }

    public function getComment_like() {
        return $this->comment_like;
    }

    public function getComment_dislike() {
        return $this->comment_dislike;
    }

    public function getComment_heart() {
        return $this->comment_heart;
    }

    public function getComment_thread() {
        return $this->comment_thread;
    }

    public function getComment_Post_date() {
        return $this->comment_post_date;
    }

    public function getComment_post_id() {
        return $this->post_id;
    }

}
