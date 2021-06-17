<?php
  include 'config.php';
  include 'function/account.php';

 ?>

 <style media="screen">
   .form-box{
       width: 400px !important;
       height: 600px !important;
   }
   input.form-control.input-field {
    font-size: 12px;
  }

  label {
      font-size: 12px;
  }
   p.error {
     color: red;
     font-style: italic;
     margin-top: 5px;
   }
 </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/SignUp.css">
</head>
<body>

  <header>
    <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
      <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
    </video>
    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="registrationForm">
          <div class="form-box">
              <div class="button-box">
                  <div id="btn"></div>
                  <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                  <button type="button" class="toggle-btn" onclick="register()">Register</button>
              </div>
              <form id="login" class="input-group" action="login.php" method="POST">
                <label for="username">Username</label>
                <input type="text" name="name" class="form-control input-field" placeholder="" value="<?php if (isset($name)) { echo htmlspecialchars($name);} ?>">
                <p class="error"><?php if(isset($errors['login_username'])) {echo $errors['login_username'];} ?></p>
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control input-field" placeholder="" value="">
                <p class="error"><?php if(isset($errors['login_password'])) {echo $errors['login_password'];} ?></p>
                <button type="submit" class="btn btn-primary btn-block submit-btn" name="login">Login</button>
              </form>
              <form id="register" class="input-group" action="login.php" method="POST">

                <label for="username">Username</label>
                <input type="text" name="username" class="form-control input-field" placeholder="Input your username..." value="<?php if (isset($username)) {
                echo htmlspecialchars($username);}?>">
                <p class="error"><?php if(isset($errors['create_username'])) {echo $errors['create_username'];} ?></p>
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control input-field" placeholder="Input your email..." value="<?php if (isset($email)) { echo htmlspecialchars($email);} ?>">
                <p class="error"><?php if(isset($errors['create_email'])) { echo $errors['create_email'];} ?></p>
                <label for="password1">Password</label>
                <input type="password" name="password1" class="form-control input-field" placeholder="Input your password..."value="">
                <p class="error"></p>
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" class="form-control input-field" placeholder="confirm your password..."value="">
                <p class="error"><?php if(isset($errors['create_password'])) { echo $errors['create_password'];} ?></p>
                <button type="submit" name="create" class="submit-btn">Create Account</button>
              </form>
          </div>
      </div>
      </div>
    </div>
  </header>



  <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-database.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
