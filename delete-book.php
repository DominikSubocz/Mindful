<?php

session_start();

require("classes/components.php");
require("classes/utils.php");

if(!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "Admin"){
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

if(!isset($_GET["id"]) || !is_numeric($_GET["id"]) || !isset($_GET["title"])){
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

$bookId = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteSubmit"])) {
    require ("classes/book.php");

    Book::delete($bookId);
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
}

$title = Utils::escape($_GET["title"]);

Components::pageHeader("Delete $title", ["style"], ["mobile-nav"]);

?>

<h2>Delete <?php echo $title; ?></h2>

<p>Are you sure you want to delete this product?</p>
<form
    method="POST"
    action="<?php echo $_SERVER["PHP_SELF"]; ?> ?id=<?php echo $bookId; ?> &title=<?php echo $_GET["title"];?>"
    class="button-group"
>

    <input type="submit" name="deleteSubmit" value="Yes" class="button">

    <a class="button danger" href="book-list.php">No</a>
</form>

<?php

    Components::pageFooter();

?>
