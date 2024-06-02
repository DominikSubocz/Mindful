<?php
require("classes/book.php");
require("classes/components.php");

$books = Book::getAllBooks();

$a[] = "";

foreach($books as $book => $v) {
    $a[] = $v['title'];
}


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;

    } else {
        $hint .= ", $name";
        $results = Book::searchArticleName($name);
        Components::allBooks($results);
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>