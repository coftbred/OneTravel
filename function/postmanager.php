<?php
    include 'config.php';
    include 'classes/Post.php';

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
            $new_Post->createPost();
            header("Location: index.php?createPost=success");
        }
    }

    function getPosts($num_posts, $conn, $limit = 12) {
        $sql = "SELECT post.post_id, post.post_title, post.post_content, post.author_id, post.date_created, post.post_img, user.user_name FROM post JOIN user ON user.user_id = post.author_id ORDER BY post.date_created DESC LIMIT ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $num_posts);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    function outputPosts($posts, $col = 3, $img = true, $teaserlen = 150, $readmore = true) {
        $output = "";

        foreach ($posts as $post) {

            $post_img = "<img class='card-img-top mt-1' src='{$post['post_img']}' style='max-width:100%; border-radius: 5%;
                border: 2px solid rgb(168 148 197); height: 25vh;'>";

            //$body = substr($post['post_content'], 0, $teaserlen);
            $output.= "<div class='col-md-{$col} mt-4 mb-4' style='width: 18rem;'>
            <div class='card h-100'>
            {$post_img}
            <div class='card-body' style='background: none;' pd-2>
                <p class='card-title' style='height:30%;'>{$post['post_title']}</p>
                <em class='card-text' style='height:20%;'>Author: {$post['user_name']}</em>
                <a href='post.php?id={$post['post_id']}' style='height:fit-content;' class='btn btn-primary mt-2'>Go To Post</a>
            </div>
            </div>
            </div>";
        }
        return $output;
      }
?>
