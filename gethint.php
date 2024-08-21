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
$sort = $_REQUEST["sort"];
$tags = $_REQUEST["tags"];

$hint = "";

// lookup all hints from array if $q is different from ""



if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  if ($sort !== ""){

    switch ($sort){
      case 'Relevancy':
        $results = Book::searchArticleName($q);
        Components::allBooks($results);
        break;
      case 'Alphabetic (A-Z)':
        $results = Book::searchArticleNameAsc($q);
        Components::allBooks($results);
        break;
      case 'Alphabetic (Z-A)':
        $results = Book::searchArticleNameDesc($q);
        Components::allBooks($results);
        break;
      default:
        var_dump("How did you even manage to get this?");
        break;
    }
  
  }

}


?>
