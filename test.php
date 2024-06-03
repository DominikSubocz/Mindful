<?php
require("classes/components.php");
Components::pageHeader("Login", ["style", "font-awesome.min"], ["mobile-nav"]);

?>



<script>
  sortType = "Relevancy";

  /* When the user clicks on the button,
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  function pickSort(type){
    sortType = type;
    document.getElementById("dropBtnTxt").innerText = "Sort By: " + type; ;

  }

  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }


  function showHint(str) {
    if (str.length == 0) { 
      document.getElementById("book-list").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("book-list").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "gethint.php?q="+str+"&sort="+sortType, true);
      xmlhttp.send();
    }
  }
</script>


<form action="">
  <label for="title">Title:</label>
  <input type="text" id="title" name="title" onkeyup="showHint(this.value)">
</form> 
<div class="dropdown">
  <button id="dropbtn" onclick="myFunction()" class="dropbtn">Sort By: <p id="dropBtnTxt">Relevancy</p> <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
  <div id="myDropdown" class="dropdown-content">
    <button onclick="pickSort('Relevancy')" class="button-blank">Relevancy</button>
    <button onclick="pickSort('Alphabetic (A-Z)')" class="button-blank">Alphabetical (A-Z)</button>
    <button onclick="pickSort('Alphabetic (Z-A)')" class="button-blank">Alphabetical (Z-A')</button>
  </div>
</div>
<div class="post-search-results">
  <div id="book-list" class="book-list">
  </div>
</div>

<?php

Components::pageFooter();

?>
