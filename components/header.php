<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>

  <?php

  if (!empty($stylesheets)) {
    foreach ($stylesheets as $sheet) {
      echo "<link rel=\"stylesheet\" href=\"css/$sheet.css\">";
    }
  }

  if (!empty($scripts)) {
    foreach ($scripts as $script) {
      echo "<script src=\"js/$script.js\" defer></script>";
    }
  }

  ?>
</head>
<body>
  <header class="page-header">
    <div class="content-wrapper desktop-header-row">
      <div class="mobile-top">
      <img class="logo" src="icons/icons8-graph-96.png">

        <button class="nav-button" id="nav-button">
          <img src="icons/nav-button.png">
        </button>
      </div>

      <nav class="page-navigation" id="nav-list">
        <ul class="nav-links">
          <div class="nav-links-left">
            <li><a href="index.php">Home</a></li>
            <li><a href="discover.php">Discover</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </div>
          <?php

          if(isset($_SESSION["loggedIn"])) {
            $user = $_SESSION["username"];
            if($_SESSION["user_role"] === "Admin") {
              echo "<li><a href='add-book.php'>Add Book</a></li>";
            }
            echo "<li><a href='basket.php'>Basket</a></li>
            <li><a href='user.php'>$user's Account</a></li>
            <li><a href='logout.php'>Logout</a></li>";
          }

          else{
            echo "<li><a class='login-btn button' href='login.php'>Login</a></li>
                <li><a class='sign-up-btn button' href='register.php'>Sign up</a></li>";

          }
          ?>
        </ul>
      </nav>
    </div>
  </header>

  <main class="content-wrapper main-content">