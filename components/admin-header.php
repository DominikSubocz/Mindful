<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
      function showHint(str) {
    if (str.length == 0) { 
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "getpageresults.php?q="+str, true);
      xmlhttp.send();
    }
  }
  </script>
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
  <header class="page-header admin-header">
    <div class="content-wrapper desktop-header-row sidebar-mobile">


      <div class="mobile-top">
        <div class="admin-logo">
          <h3>Mindful Dashboard</h3>
          <hr>
          <h4>Admin Dashboard</h4>
        </div>
        <button class="nav-button" id="nav-button">
          <img src="icons/nav-button.png">
        </button>
      </div>


        <div class="sidebar">
          <div class="sidebar-navigation">
            <ul>
              <a href="add-book.php">Add Book</a>
              <a href="add-tag.php">Add Tag</a>
              <a href="tag-list.php">Add Book</a>
              <a href="event-list.php">Events</a>
              <a href="user-list.php">Users</a>
            </ul>
          </div>

        </div>


      <div class="header-searchbar">
        <form action="">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" onkeyup="showHint(this.value)">
        <p>Suggestions: <span id="txtHint"></span></p>
        </form>
      </div>

    </div>
  </header>

  <main class="content-wrapper main-content">