<?php
require("classes/sql.php");
require("classes/connection.php");

$heading = $_REQUEST["heading"];
$subHeading = $_REQUEST["sub_heading"];
$content = $_REQUEST["content"];

$conn = Connection::connect();

$stmt = $conn->prepare(SQL::$insertArticle);
if($stmt->execute([$heading, $subHeading, $content])) {
    echo "Success!";
} else {
    echo "Fail!";
}


?>