<!doctype php>
<php lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Page Title</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" type="text/css" href="flaticon/flaticon.css">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <header>
    <div class="container"> <!-- nav bar -->
      <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#"><img src="https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.15752-0/s261x260/158914288_879984149237352_6987703374521874250_n.jpg?_nc_cat=105&ccb=1-3&_nc_sid=ae9488&_nc_ohc=Q8bOyERo7RYAX85Qm0F&_nc_ht=scontent.fsgn5-2.fna&tp=7&oh=cf063bb6d2c8cb1cf6b5625d39f011ca&oe=60700F18" class="img-fluid pull-xs-left d-inline-block align-center" width="50px" alt="..."></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Destinations
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="Destinations.php">London</a>
              <a class="dropdown-item" href="Destinations.php">Japan</a>
              <a class="dropdown-item" href="Destinations.php">Dubai</a>
              <a class="dropdown-item" href="Destinations.php">Italy</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Discount.php">Discount</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="About.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Blog.php">Blog</a>
          </li>
          <?php if ($_SESSION['loggedin'] == true): ?>
            <li class="nav-item active">
              <a class="nav-link" href="user.php?id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-user"></i> <?php  echo htmlspecialchars($_SESSION["user_name"] . " ");?>  | <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="logout.php"><i class="fa fa-door"></i>Logout<span class="sr-only">(current)</span></a>
            </li>
          <?php else: ?>
            <li class="nav-item active">
              <a class="nav-link" href="login.php"><i class="fa fa-user"></i> Sign in<span class="sr-only">(current)</span></a>
            </li>
          <?php endif; ?>
        </ul>
        <ul class=" ml-auto list-unstyled d-flex text-right mb-0">
          <li class="nav-item">
            <a href="#" class="pl-0 pr-3 text-black"><i class="fab fa-facebook"></i></a>
          </li>
          <li class="nav-item">
            <a href="#" class="pl-0 pr-3 text-black"><i class="fab fa-instagram"></i></a>
          </li>
          <li class="nav-item">
            <a href="#" class="pl-0 pr-3 text-black"><i class="fab fa-github"></i></a>
          </li>
          <li class="nav-item">
            <a href="#" class="pl-0 pr-3 text-black"><i class="fab fa-twitter"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </div> <!-- end of nav bar -->
  </header>
