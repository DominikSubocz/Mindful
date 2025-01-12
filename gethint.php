<?php
require("classes/book.php");
require("classes/components.php");


$books = Book::getAllPosts();

$a[] = "";

foreach($books as $book => $v) {
    $a[] = $v['heading'];
}


// get the q parameter from URL
$q = $_REQUEST["q"];
$sort = $_REQUEST["sort"];
$tags = $_REQUEST["tags"];

$tagsArray = explode(',', $tags);
$tempArray = [];
if(!empty($tags)){
  
}
foreach($tagsArray as $tag){
  array_push($tempArray, $tag);
  array_push($tempArray, "|");
}
array_pop($tempArray);
$searchTags = implode('', $tempArray);



$hint = "";

// lookup all hints from array if $q is different from ""



if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  if ($sort !== ""){

    $results = Book::searchArticleName($q, $sort, $searchTags);
    Components::allPosts($results);

    }
  
  }


?>
