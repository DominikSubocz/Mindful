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
  function myFunction(dropdown, button) {
    var abc = document.getElementById(button).getElementsByTagName("i")[0];
    abc.classList.toggle("fa-chevron-down");
    abc.classList.toggle("fa-chevron-up");

    document.getElementById(dropdown).classList.toggle("show");
    console.log(abc);
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




  <div class="dropdown">
      <button id="dropbtn" onclick="myFunction('myDropdown','dropbtn')" class="dropbtn">Sort By: <p id="dropBtnTxt">Relevancy</p> <i class="fa fa-chevron fa-chevron-down" aria-hidden="true"></i></button>
      <div id="myDropdown" class="dropdown-content">
        <button onclick="pickSort('Relevancy')" class="button-blank">Relevancy</button>
        <button onclick="pickSort('Alphabetic (A-Z)')" class="button-blank">Alphabetical (A-Z)</button>
        <button onclick="pickSort('Alphabetic (Z-A)')" class="button-blank">Alphabetical (Z-A')</button>
      </div>
    
      <button id="tagsDropBtn" onclick="myFunction('tagsDropdown', 'tagsDropBtn')" class="dropbtn">Tags <i class="fa fa-chevron fa-chevron-down" aria-hidden="true"></i></button>
      <div id="tagsDropdown" class="tag-content show">
    
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

  <div class="search-container-top">
    <div class="searchBar">
      <form action="">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" onkeyup="showHint(this.value)">
      </form>
    </div>
    <div class="post-search-results">
      <div id="book-list" class="book-list">
    </div>
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

  let selected = [];
  
  for(let i = 0; i < checkboxes.length; i++){
    if(checkboxes[i].checked == true){
      selected.push(checkboxes[i].name);
    }
  }


  selected = selected.filter((item, index) => selected.indexOf(item) === index);
  tags = selected;

  showHint(searchBox.value);


  console.log(tags);

}



</script>


<?php

Components::pageFooter();

?>
