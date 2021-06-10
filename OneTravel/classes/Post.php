<?php 
    class Post {
        public $post_id;
        public $author_id;
        public $post_title;
        public $post_content;
        public $post_img;
        public $date_created;
        public $destination_id;
        public $conn;
        
        // constructor
        public function __construct($author_id, $post_title, $post_content, $post_img, $destination_id, $conn){
            $sql = "INSERT INTO post (author_id, post_title, post_content, post_img, destination_id) VALUES  (?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssi", $author_id, $post_title, $post_content, $post_img, $destination_id);
            $stmt->query();
        }

        public function getPost($post_id) {
            $sql = "SELECT * FROM post WHERE post_id = ?";
        }

    }
?>