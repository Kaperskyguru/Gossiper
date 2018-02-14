<?php

class GossipsModel {

    private static $instance;
    private $post_id;
    private $post_title;
    private $post_content;
    private $post_like;
    private $post_dislike;
    private $post_heart;
    private $post_tag;
    private $post_comment;
    private $post_date;
    private $post_image;
    private $loc_id;

    function __construct() {
        
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

   private function __clone() {}

    public function setGossipPost_id($post_id) {
        $this->post_id = $post_id;
    }

    public function setPost_title($post_title) {
        $this->post_title = $post_title;
    }

    public function setPost_content($post_content) {
        $this->post_content = $post_content;
    }

    public function setPost_like($post_like) {
        $this->post_like = $post_like;
    }

    public function setPost_dislike($post_dislike) {
        $this->post_dislike = $post_dislike;
    }

    public function setPost_heart($post_heart) {
        $this->post_heart = $post_heart;
    }

    public function setPost_tag($post_tag) {
        $this->post_tag = $post_tag;
    }

    public function setPost_comment($post_comment) {
        $this->post_comment = $post_comment;
    }

    public function setPost_date($post_date) {
        $this->post_date = $post_date;
    }

    public function setPost_image($post_image) {
        $this->post_image = $post_image;
    }

    public function setLoc_id($lock_id) {
        $this->loc_id = $lock_id;
    }

    public function getPost_id() {
        return $this->post_id;
    }

    public function getPost_title() {
        return $this->post_title;
    }

    public function getPost_content() {
        return $this->post_content;
    }

    public function getPost_like() {
        return $this->post_like;
    }

    public function getPost_disklike() {
        return $this->post_dislike;
    }

    public function getPost_heart() {
        return $this->post_heart;
    }

    public function getPost_tag() {
        return $this->Post_tag;
    }

    public function getPost_image() {
        return $this->post_image;
    }

    public function getPost_comment() {
        return $this->post_comment;
    }

    public function getPost_date() {
        return $this->post_date;
    }

    public function getLoc_id() {
        return $this->loc_id;
    }

}
