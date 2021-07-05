<?php 
    class Post {
        public $id;
        public $user_id;
        public $post_title;
        public $post_content;
        public $img;
        public $date_created;
        public $destination_id;
        public $post = [];
        public $posts = [];
        public $errors = [];
        public $conn;
        
        // constructor
        public function __construct($conn){
            $this->conn = $conn;
        }

        public function createPost() {
            $sql = "INSERT INTO post (user_id, post_title, post_content, img, destination_id) VALUES  (?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("isssi", $this->user_id, $this->post_title, $this->post_content, $this->img, $this->destination_id);
            $stmt->execute();
        }

        public function updatePost() {
            $sql = "UPDATE post SET post_title = ?, post_content = ?, img = ?, destination_id = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssii", $this->post_title, $this->post_content, $this->img, $this->destination_id, $this->id);
            $stmt->execute();
        }

        public function getPost($post_id) {
            $this->id = $post_id;
            $sql = "SELECT * FROM post WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->post =  $result->fetch_assoc();
        }

        public function getPosts($num_posts) {
            $sql = "SELECT post.id, post.post_title, post.post_content, post.user_id, post.date_created, post.img, user.username FROM post JOIN user ON user.id = post.user_id ORDER BY post.date_created DESC LIMIT ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $num_posts);
            $stmt->execute();
            $results = $stmt->get_result();
            if ($results->num_rows >= 1) {
                $this->posts = $results->fetch_all(MYSQLI_ASSOC);
            }
        }

        public function deletePost() {
            $sql = "DELETE FROM post WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('i', $this->id);
            $stmt->execute();

            $sql = "DELETE FROM comment WHERE post_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('i', $this->id);
            $stmt->execute();
        }




        public function checkPost($post_title, $post_content, $img, $destination_id, $user_id, $postID = 0, $task = 0) {
            $this->id = $postID;
            $this->user_id = $user_id;
            $this->post_title = $post_title;
            $this->post_content = $post_content;
            $this->img = $img;
            $this->destination_id = $destination_id;

            if ($this->post_title == "" || $this->post_content == "" || $this->img == "") {
                $missing = "Post Title, Content, or Image's URL cannot be empty!";
                $this->errors['notNull'] = $missing;
            }

            if (empty($this->errors) && $task == 0) {
                $this->createPost();
                header("Location: Blog.php?createPost=success");
            }

            if (empty($this->errors) && $task == 1) {
                $this->updatePost();
                $location = "Location: post.php?id=" . (string)$this->id;
                header($location);
            }
        }
    }
?>