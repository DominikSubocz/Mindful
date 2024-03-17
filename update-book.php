<?php

session_start();

require("classes/components.php");
require("classes/utils.php");

if(!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "Admin") {
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

if(!isset($_GET["id"]) || !is_numeric($_GET["id"])){
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

$bookId = $_GET["id"];
$output = "";

require("classes/book.php");

$book = Book::getBook($bookId);

if(empty($book)) {
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

$title = Utils::escape($book["title"]);
$author = Utils::escape($book["author"]);
$price = Utils::escape($book["price"]);

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updateSubmit"])) {
    $output = Book::validate();

    if(!$output) {
        Book::update();
        header("Location: " . Utils::$projectFilePath . "/book.php?id=$bookId");

    }
}

Components::pageHeader("Update $title", ["style"], ["mobile-nav"]);

?>

<h2>Edit <?php echo $title; ?></h2>

<form
    method="POST"
    action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $book["book_id"];?>"
    encypte="multipart/form-data"
    class="form"
>
    <label>Title</label>
    <input type="text" name="title" value="<?php echo $title; ?>">

    <label>Author</label>
    <input type="text" name="author" value="<?php echo $author ?>">

    <label>Price</label>
    <input type="text" name="price" value="<?php echo $price ?>">


    <label>Cover image</label>
    <input type="file" name="coverImage" value="">

    <input class="button" type="submit" name="updateSubmit" value="Update Book Details">

    <?php if ($output) { echo $output; } ?>
</form>

<?php

Components::pageFooter();

?>

