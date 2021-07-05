<?php 
    include 'config.php';
    include 'classes/Comment.php';
    include 'classes/Post.php';
    include 'includes/header.php';

    if (isset($_GET['id'])) {
        $post = new Post($conn);
        $post->getPost($_GET['id']);

        $comments = new Comment($_GET['id'], $conn);
        $comments->getComments();
    }

    if (isset($_GET['delete'])) {
        $post = new Post($conn);
        $post->getPost($_GET['id']);
        $post->deletePost();

        header("Location: blog.php?delete=success");
    }
?>


    <div class="jumbotron"
        <?php if (isset($post->post['img'])): ?>
            style='background:url("<?php echo $post->post['img']; ?>");'
        <?php endif; ?>>
        <div class="container text-white">
            <h1 class="display-3">
                <?php echo htmlspecialchars($post->post['post_title']); ?>
            </h1>
            <p class="lead">
                <?php echo htmlspecialchars($post->post['date_created']); ?>
            </p>
            <?php if ($post->post['user_id'] == $_SESSION['user_id']): ?>
                <a href="edit.php?id=<?php echo $post->post['id'];?>" class="btn btn-primary">Edit Post</a>
                <a href="post.php?id=<?php echo $post->post['id'];?>&delete=yes" class="btn btn-danger">Delete Post</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <?php if (isset($_GET['create'])): ?>
            <div class="alert alert-success" role="alert">
                Your post was successfully created!
            </div>
        <?php elseif (isset($_GET['save'])): ?>
            <div class="alert alert-success" role="alert">
                Your post was successfully saved!
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="text-center" style="width: 100%;">
                <h3>Content</h3>
            </div>
            <p>
                <?php if (isset($post->post['post_content'])): ?>
                    <?php echo htmlspecialchars($post->post['post_content']); ?>
                <?php endif; ?>
            </p>
        </div>
        <hr>
        <h2 class="text-center display-4 mt-3 mb-3">Comments</h2>
        <hr>
        <div class="row comments">
            <div class="col-md-6 offset-md-3 form">
                <?php if ($_SESSION['loggedin']): ?>
                    <form class="comment-form" method="POST" action="function/ajaxmanager.php?comment=true&<?php echo htmlspecialchars($_SERVER['QUERY_STRING']); ?>">
                        <textarea name="comment-text" cols="70" rows="4"></textarea>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SERVER['QUERY_STRING']); ?>">                          
                        <button type="submit" name="comment-submit" class="btn btn-outline-success mt-2"><i class="far fa-comment"></i> Add Comment</button>                       
                    </form>
                <?php else: ?>
                    <h3>Please Login To Comment!</h3>
                    <a href="login.php"><button type="button" class="btn btn-primary btn-lg">LOGIN</button></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="comments_before row mt-5">
            <?php $comments->outputComments($_SESSION['user_id'], $_SERVER['QUERY_STRING']); ?>
        </div>
    </div>

<?php 
    include 'includes/footer.php';
?>