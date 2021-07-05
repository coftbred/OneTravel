<?php 
    
    class Comment {
        // properties.
        public $comment_id;
        public $comment_text;
        public $comment_userID;
        public $comment_postID;        
        public $comments = [];
        public $insert_id;
        public $conn;


        // constructor function.
        public function __construct($post_ID, $conn) {
            $this->comment_postID = $post_ID;
            $this->conn = $conn;
        }

        // Comment methods.
        public function getComments() {
            $sql = "SELECT c.id AS comment_id, u.username, c.comment_content, c.date_created, c.user_id, c.post_id FROM comment c JOIN user u ON u.id = c.user_id WHERE c.post_id = ? ORDER BY c.date_created DESC";            
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $this->comment_postID);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->comments = $result->fetch_all(MYSQLI_ASSOC);
        }

        public function outputComments($current_user_id) {
            $output = "";
            foreach ($this->comments as $comment) {
                if ($current_user_id == $comment['user_id'])
                    $output .= "
                        <div class='col-md-6 offset-md-3 mt-5 mb-4' style='height: auto;'>
                            <div class='card'>
                                <div class='card-header'>
                                    {$comment['username']} | {$comment['date_created']}
                                    <a href='#' data-comment-number='{$comment['comment_id']}' data-post-id='{$comment['post_id']}'><button class='delete-comment float-right btn btn-outline-danger btn-sm'>X</button></a>                             
                                </div>                        
                                <div class='body-body'>
                                    <p class='card-text'>{$comment['comment_content']}</p>
                                </div>
                            </div>                                        
                        </div>
                    ";
                else {
                    $output .= "
                        <div class='col-md-6 offset-md-3 mt-5 mb-4' style='height: auto;'>
                            <div class='card'>
                                <div class='card-header'>
                                    {$comment['username']} | {$comment['date_created']}
                                </div>                        
                                <div class='body-body'>
                                    <p class='card-text'>{$comment['comment_content']}</p>
                                </div>
                            </div>                                        
                        </div>
                    ";
                }
            }
            echo $output;
        }

        public function createComment($comment_text, $user_id) {
            $sql = "INSERT INTO comment (comment_content, user_id, post_id) VALUES (?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sii", $comment_text, $user_id, $this->comment_postID);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                $this->comment_id = $stmt->insert_id;
                $this->getComment();
                }
        }

        public function getComment($check = 0) {
            $sql = "SELECT u.username, c.comment_content, c.date_created, c.id, c.post_id FROM comment c JOIN user u ON u.id = c.user_id WHERE c.id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $this->comment_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($check == 0)
                echo json_encode($result->fetch_all(MYSQLI_ASSOC));
        }

        public function deleteComment($comment_id) {
            $this->comment_id = $comment_id;
            $this->getComment(1);
            $sql = "DELETE FROM comment WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $this->comment_id);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                echo true;
            }
            else {
                echo false;
            }
        }
    }

?>