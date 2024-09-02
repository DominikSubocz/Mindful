<?php
require("classes/components.php");
require("classes/tags.php");
Components::pageHeader("Login", ["style", "font-awesome.min"], ["mobile-nav", "formatting"]);

?>

<label for="heading">Heading:</label>
<input type="text" id="heading" name="heading">

<label for="subHeading">Sub heading:</label>
<input type="text" id="subHeading" name="subHeading">

<label for="articleContent">Text:</label>
<div id ="editorToolbar" class="editorToolbar">
    <div class="toolbarFormatting">
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
    </div>

    <div id="editorTextArea" class="editorTextArea" contenteditable="true">
        Enter some text
    </div>

</div>
