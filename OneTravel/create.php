<?php 
    include 'config.php';
    include 'function/postmanager.php';
    include 'includes/header.php';

    if (isset($_POST['POST'])) {
        //checkPost($_POST, $_SESSION['user_id'], $errors, $conn);
    }

?>

    <div class="contaier">
        <?php if ($_SESSION['logged_in'] == true): ?>
            <div class="mt-5 col-md-6 offset-md-3 text-center">
                <h2 class="display-5">Please Login to Post</h2>
                <p>Create an account or login to the website.</p>
            <button type="button" class="btn btn-block btn-outline-primary"><a href="SignUp.php"><i class="fas fa-sign-in-alt"></i> Create Account/Login</a></button>
        </div>
        <?php else: ?>
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

                <div class="text-center mt-3">
                    <h1>Create A New Blog</h1>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="col-md-6 offset-md-3 text-left">
                        <form action="create.php" method="post">
                            <select name="country" onchange="changeCountry()" class="form-control mt-1 country">
                                <option value="England">England</option>
                                <option value="Japan">Japan</option>
                                <option value="Dubai">Dubai</option>
                                <option value="Italy">Italy</option>
                            </select>

                            <select name="destination" class="form-control mt-1 destination">
                                <option value="Italy">Italy</option>
                                <option value="Italy">Italy</option>
                                <option value="Italy">Italy</option>
                                <option value="Italy">Italy</option>
                            </select>

                            <label for="title" class="mt-1" >  Title</label>
                            <input type="text" name="title" class="form-control">

                            <label for="img" class="mt-1">Put your image link below</label>
                            <input type="text" name="img" class="form-control">
                            
                            <label for="content" class="mt-1">  Content</label>
                            <textarea name="content" cols="50" rows="10" class="form-control"></textarea>

                            <button type="submit" name="submit" class="btn btn-outline-primary btn-block mt-2">Submit</button>
                        </form>
                    </div>
                </div>`
            </div>
        <?php endif; ?>
    </div>

<?php 
    include 'includes/footer.php';
?>