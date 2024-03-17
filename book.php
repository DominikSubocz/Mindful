<?php

session_start();

require("classes/components.php");
require("classes/utils.php");
require("classes/book.php");

if(!isset($_GET["id"]) || !is_numeric($_GET["id"])){
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
} 

if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["action"]) &&
    $_GET["action"] === "add"
) {
    if(!isset($_SESSION["loggedIn"])){
        header("Location: " . Utils::$projectFilePath . "/login.php");
    }

    require("classes/basket.php");

    Basket::add($_GET["id"]);
    header("Location: " . Utils::$projectFilePath . "/login.php");
}

$book = Book::getBook($_GET["id"]);

$pageTitle = "Book not found";

if(!empty($book)){
    $pageTitle = $book["title"] . "-" . $book["author"];
}

Components::pageHeader($pageTitle, ["style"], ["mobile-nav"]);
Components::singleBook($book);
Components::pageFooter();