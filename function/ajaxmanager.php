<?php 
    include '../config.php';
    include '../classes/Comment.php';
    include '../classes/Post.php';

    if (isset($_POST['country'])) {
        $c_id = $_POST['country'];
        $name = getDestination_Name($c_id, $conn);
        echo json_encode($name);        
    }

    function getDestination_Name($c_id, $conn) {
        $sql = "SELECT name, country_id FROM destination WHERE country_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $c_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    if (isset($_POST['comment'])) {
        $post_id = $_POST['post_id'];
        $user_id = $_SESSION['user_id'];
        $comment_text = $_POST['comment'];
        $comment = new Comment($post_id, $conn);
        $comment->createComment($comment_text, $user_id);
    }

    if (isset($_POST['delete-comment'])) {
        $comment_id = $_POST['comment_id'];
        $post_id = $_POST['post_id'];
        $comment = new Comment($post_id, $conn);
        $comment->deleteComment($comment_id);
    }

?>