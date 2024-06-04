<?php
require("classes/book.php");
require("classes/components.php");



$a[] = "Add Book";
$a[] = "Add Tag";
$a[] = "Tag List";
$a[] = "Article List";
$a[] = "Event lIST";
$a[] = "User List";


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
        Components::singleLink($name);

    }


  }
}


?>
