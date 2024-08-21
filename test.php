<?php
require("classes/components.php");
require("classes/tags.php");
Components::pageHeader("Login", ["style", "font-awesome.min"], ["mobile-nav"]);

?>



<script>
  sortType = "Relevancy";
  tags = [];


  /* When the user clicks on the button,
  toggle between hiding and showing the dropdown content */
  function myFunction(dropdown) {
    document.getElementById(dropdown).classList.toggle("show");
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
      xmlhttp.open("GET", "gethint.php?q="+str+"&sort="+sortType+"&tags="+tags, true);
      xmlhttp.send();
    }
  }
</script>


<div class="search-container">
  <div class="search-options-container">
    <form action="">
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" onkeyup="showHint(this.value)">
    </form>
    <div class="dropdown">
      <button id="dropbtn" onclick="myFunction('myDropdown')" class="dropbtn">Sort By: <p id="dropBtnTxt">Relevancy</p> <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
      <div id="myDropdown" class="dropdown-content">
        <button onclick="pickSort('Relevancy')" class="button-blank">Relevancy</button>
        <button onclick="pickSort('Alphabetic (A-Z)')" class="button-blank">Alphabetical (A-Z)</button>
        <button onclick="pickSort('Alphabetic (Z-A)')" class="button-blank">Alphabetical (Z-A')</button>
      </div>
    
      <button id="dropbtn" onclick="myFunction('tagsDropdown')" class="dropbtn">Tags <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
      <div id="tagsDropdown" class="tag-content">
    
        <?php
    
          $tags = Tags::getAllTags();
          ?>
          <div class="tags-container">
            <?php
            Components::allTags($tags);
            ?>
          </div>
    
        
    
      </div>
    </div>
  </div>
  
  <div class="post-search-results">
    <div id="book-list" class="book-list">
    </div>
  </div>
</div>

<script>

let searchBox = document.getElementById("title");

function pickSort(type){
    sortType = type;
    document.getElementById("dropBtnTxt").innerText = "Sort By: " + type; ;
    showHint(searchBox.value);

  }

function tickTag(){
  const checkboxes = document.querySelectorAll("#myCheck");
  
  for(let i = 0; i < checkboxes.length; i++){
    if(checkboxes[i].checked == true){
      tags.push(checkboxes[i].name);
    }
    
    if(checkboxes[i].checked == false) {
        if (tags[i] == checkboxes[i].name){
          tags.splice(i, 1);
          console.log(i);
        }
    }
  }
  tags = tags.filter((item, index) => tags.indexOf(item) === index);
  console.log(tags);

}



</script>


<?php

Components::pageFooter();

?>
