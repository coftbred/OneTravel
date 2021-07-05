<?php 
    include 'config.php';
    include 'classes/Destination.php';
    include 'classes/Post.php';
    include 'includes/header.php';

    if (isset($_GET['id'])) {
        $post = new Post($conn);
        $post->getPost($_GET['id']);
    }

    if (isset($_POST['submit'])) {
        #checkPost($_POST, 1, $errors, $conn, 1);
        # GET DESTINATION ID
        $desID = new Destination($conn);
        $desID->getID($_POST['destination']);
        
        $edit_Post = new Post($conn);
        $edit_Post->checkPost($_POST['title'], $_POST['content'], $_POST['img'], $desID->destination['id'], $_SESSION['user_id'], $_POST['postID'], 1);
        $errors = $edit_Post->errors;
    }
?>


<div class="container">
    <div class="row">
        <div class="mt-3 col-md-6 offset-md-3">
            <?php if(isset($errors)): ?>
                <div class="alert alert-danger">
                    <?php
                        foreach ($errors as $error) {
                            echo $error . "<br>";
                        }
                    ?>
                </div>
            <?php endif; ?>
            <div class="text-center">
                <h1>EDIT YOUR POST</h1>
            </div>
            <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST" enctype="multipart/form-data">
                
                <img class="card-img-top mb-2" src="<?php echo $post->post['img']; ?>" style="max-width:100%; border-radius: 5%;
                    border: 2px solid rgb(168 148 197); height: 20rem;">

                <label class="mt-3" for="">Please, Choose Country & Destination Again!</label>
                <select name="country" onchange="changeCountry()" class="form-control mt-1 country">
                    <option value="1">England</option>
                    <option value="2">Japan</option>
                    <option value="3">Dubai</option>
                    <option value="4">Italy</option>
                </select>

                <select name="destination" class="form-control mt-1 destination">
                    <option value="Greenwich">Greenwich</option>
                    <option value="Warner Bros">Warner Bros</option>
                    <option value="Tower of London">Tower of London</option>
                </select>

                <label class="mt-3" for="image">Upload New URL Image here</label>
                <input type="text" name="img" class=" form-control" value="<?php echo $post->post['img']; ?>">

                <label class="mt-3" for="title">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $post->post['post_title']; ?>">

                <label class="mt-3" for="content">Post Content</label>
                <textarea name="content" cols="100" rows="8" class="form-control"><?php echo $post->post['post_content'];?></textarea>

                <input type="hidden" name="postID" value="<?php echo $_GET['id']; ?>">

                <button type="submit" name="submit" class="btn btn-outline-dark btn-block mb-2 mt-2"><i class="fas fa-edit"></i> Save Post</button>
            </form>
        </div>
    </div>
</div>


<?php 
    include 'includes/footer.php';
?>