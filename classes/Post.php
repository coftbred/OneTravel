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
            $this->author_id = $author_id;
            $this->post_title = $post_title;
            $this->post_content = $post_content;
            $this->post_img = $post_img;
            $this->destination_id = $destination_id;
            $this->conn = $conn;
        }

        public function createPost() {
            $sql = "INSERT INTO post (author_id, post_title, post_content, post_img, destination_id) VALUES  (?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("isssi", $this->author_id, $this->post_title, $this->post_content, $this->post_img, $this->destination_id);
            $stmt->execute();
        }

        public function getPost($post_id) {
            $sql = "SELECT * FROM post WHERE post_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $post_id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }

    }
?>