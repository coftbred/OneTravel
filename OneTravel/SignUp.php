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
              <button class="submit-btn mb-5"><a href="index.php">Back HomePage</a></button>
                <div class="button-box mt-5">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                    <button type="button" class="toggle-btn" onclick="register()">Register</button>
                </div>
                <div class="alert info alert-info ">asdfa</div>
                <form id="login" class="input-group">
                    <input type="email" class="input-field" id="email-sign-in" placeholder="Email" required>
                    <input type="password" class="input-field" id="password-sign-in" placeholder="Password" required>
                    <button type="submit" class="submit-btn" id="sign-in">Log In</button>
                </form>
                <form id="register" class="input-group">
                    <input type="text" class="input-field" id="username-field" placeholder="Username" required>
                    <input type="email" class="input-field" id="email-field" placeholder="Email" required>
                    <input type="password" class="input-field" id="password-field" placeholder="Password" required>
                    <input type="password" class="input-field" id="confirm-password-field" placeholder="Confirm Password" required>
                    <button type="submit" class="submit-btn" id="sign-up">Sign Up</button>
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
