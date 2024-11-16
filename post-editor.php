<?php
require("classes/components.php");
require("classes/tags.php");

$id = $_GET['id'];

Components::pageHeader("Login", ["style", "font-awesome.min"], ["mobile-nav"]);



?>

<div class="editorContainer">
  <label for="heading">Heading:</label>
  <input type="text" id="heading" name="heading">
  
  <label for="subHeading">Sub heading:</label>
  <input type="text" id="subHeading" name="subHeading">
  
  <label for="articleContent">Text:</label>
  <div id ="editorToolbar" class="editorToolbar">
      <div class="toolbarFormatting">
        <select name="cars" id="cars" form="carform" onInput="fontSize(this.value)">
          <option value="10">10</option>
          <option value="12">12</option>
          <option value="14">14</option>
          <option value="16">16</option>
          <option value="18">18</option>
          <option value="20">20</option>
          <option value="24">24</option>
          <option value="28">28</option>
          <option value="32">32</option>
          <option value="36">36</option>
          <option value="40">40</option>
          <option value="48">48</option>
          <option value="56">56</option>
          <option value="64">64</option>
          <option value="72">72</option>
          <option value="80">80</option>
          <option value="96">96</option>
        </select>
        <button onclick="format(this)"><i class="fa fa-align-left" aria-hidden="true"></i></button>
        <button onclick="format(this)"><i class="fa fa-align-center" aria-hidden="true"></i></button>
        <button onclick="format(this)"><i class="fa fa-align-right" aria-hidden="true"></i></button>
        <button onclick="format(this)"><i class="fa fa-bold" aria-hidden="true"></i></button>
        <button onclick="format(this)"><i class="fa fa-italic" aria-hidden="true"></i></button>
        <button onclick="format(this)"><i class="fa fa-underline" aria-hidden="true"></i></button>
        <button onclick="format(this)"><i class="fa fa-strikethrough" aria-hidden="true"></i></button>
        <button onclick="format(this)"><i class="fa fa-list" aria-hidden="true"></i></button>
        <button onclick="format(this)"><i class="fa fa-list-ol" aria-hidden="true"></i></button>
        <button onclick="format(this)"><i class="fa fa-quote-left" aria-hidden="true"></i></button>
        <button onclick="showAssets()"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
      </div>
  
      <div id="editorTextArea" class="editorTextArea" >
        <span contenteditable="true"></span>
      </div>
  
  </div>
  
  <div id="myModal" class="modal">
  
    <!-- Modal content -->
    <div class="modal-content">
      <div class="assetList">
              <?php
                  Components::getLocalImages();
              ?>
          </div>
    </div>
    <div>
      <button class="upload-btn">Upload Image</button>
    </div>
    <span id="close" class="close">&times;</span>
    <p>Choose an image from the assets or upload new image</p>
  </div>
</div>

<form id='saveForm'>
  <input type='submit' value='Save Article'/>
  <input type='hidden' value='' id='postContent'/>
  <input type="hidden" id="hiddenPostId" value = "<?php echo $id; ?>">
</form>
<script src="js/formatting.js"></script>
