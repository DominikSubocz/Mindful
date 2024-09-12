<?php
require("classes/sql.php");
require("classes/connection.php");

// $heading = $_REQUEST["heading"];
// $subHeading = $_REQUEST["sub_heading"];
$content = $_REQUEST["content"];

echo($content);

// $conn = Connection::connect();

// $stmt = $conn->prepare(SQL::$insertArticle);
// $stmt->execute([$heading, $subHeading, $content]);

?>