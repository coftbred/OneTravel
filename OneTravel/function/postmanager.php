<?php 
    // include '../config.php';
    // include '../classes/Post.php';

    function checkPost($POST, $user_id, &$errors, $conn) {
        $post_title = $POST['title'];
        $post_content = $POST['content'];
        $post_img = $POST['img'];
        $destination_id = $POST['destination'];
        $author_id = $user_id;

        if ($post_title == "" || $post_content == "" || $post_img == "") {
            $missing = "Post Title, Content, or Image's URL cannot be empty!";
            $errors['title'] = $missing;
        }

        if (empty($errors)){
            $new_Post = new Post($author_id, $post_title, $post_content, $post_img, $destination_id, $conn);
        }


    }
?>