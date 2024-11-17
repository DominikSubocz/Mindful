<?php
require("classes/sql.php");
require("classes/connection.php");
require("classes/book.php");


$id = $_REQUEST["id"];
$heading = $_REQUEST["heading"];
$subHeading = $_REQUEST["sub_heading"];
$content = $_REQUEST["content"];

$conn = Connection::connect();

$postExists = Book::getPostById($id);

if($postExists) {
    echo "Update";
    $updateStatus = Book::updatePost($heading, $subHeading, $content, $id);

    if(!$updateStatus) {
        echo "Failed to update post";
    } else {
        echo "Update Successful";
    }
    
} else {
    $stmt = $conn->prepare(SQL::$insertArticle);
    if($stmt->execute([$id, $heading, $subHeading, $content])) {
        echo "Success!";
    } else {
        echo "Fail!";
    }
}



?>