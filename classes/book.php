<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

class Book{
    public static function getAllBooks(){
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getAllBooks);
        $stmt->execute();
        $books = $stmt->fetchAll();

        $conn = null;

        return $books;


    }

    public static function getBook($bookId){
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getBook);
        $stmt->execute([$bookId]);
        $book = $stmt->fetch();

        $conn = null;

        return $book;
    }

    public static function validate() {
        if(Utils::postValuesAreEmpty(["title", "author", "price"])){
            return "<p class='error'>ERROR: One or more inputs are empty</p>";
        }

        $output = "";

        if(strlen($_POST["title"]) < 4 || strlen($_POST["title"]) > 128){
            $output .= "<p class='error'>ERROR: Title must be between 4 and 128 characters long</p>";
        }

        if(strlen($_POST["title"]) < 4 || strlen($_POST["author"]) > 48){
            $output .= "<p class='error'>ERROR: Author must be between 4 and 48 chracters long</p>";
        }

        $filteredPrice = filter_var($_POST["price"], FILTER_VALIDATE_FLOAT);

        if (!$filteredPrice) {
            $output .= "<p class='error'>ERROR: Price is invalid</p>";
        }

        if($output){
            return $output;
        }

        if(!empty($_FILES["coverImage"]["name"])){
            $filename = $_FILES["coverImage"]["name"];
            $filetype = Utils::getFileExtension($filename);
            $isValidImage = in_array($filetype, ["jpg", "jpeg","png","gif"]);

            $isValidSize = $_FILES["coverImage"]["size"] <= 1000000;
            
            if(!$isValidImage || !$isValidSize){
                return "<p class='error'>ERROR: Invalid file size/format</p>";
                
            }

            $tmpname = $_FILES["coverImage"]["tmp_name"];

            if(!move_uploaded_file($tmpname, "images/$filename" )){
                return "<p class='error'>ERROR: File was not upload</p>";

            }
        }

        return "";


    }

    public static function create() {
        $filename = Utils::$defaultBookCover;

        if(!empty($_FILES["coverImage"]["name"])){
            $filename = $_FILES["coverImage"]["name"];
        }

        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$createBook);
        $stmt->execute([$_POST["title"], $_POST["author"],$_POST["price"], $filename]);

        $insertedId = $conn->lastInsertId();

        $conn = null;

        return $insertedId;
    }

    public static function update() {
        $conn = Connection::connect();

        if(!empty($_FILES["coverImage"]["name"])){
            $stmt = $conn->prepare(SQL::$updateBook);
            $stmt->execute([
                $_POST["title"],
                $_POST["author"],
                $_POST["price"],
                $_FILES["coverImage"]["name"],
                $_GET["id"]

            ]);
        } else {
            $stmt = $conn->prepare(SQL::$updateBookNoFile);
            $stmt->execute([
                $_POST["title"],
                $_POST["author"],
                $_POST["price"],
                $_GET["id"]

            ]);
        }

        $conn = null;
    }

    public static function delete($bookId) {
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$deleteBook);
        $stmt->execute([$bookId]);

        $conn = null;

    }

    public static function basketTable($booksArray){
        $userId = $_SESSION["user_id"];

        if(!empty($booksArray)){
            $totalPrice = 0;

            require("components/basket-header.php");

            foreach ($booksArray as $book){
                $currentId = Utils::escape($book["book_id"]);
                $title = Utils::escape($book["title"]);
                $author = Utils::escape($book["author"]);
                $price = Utils::escape($book["price"]);
                $quantity = Utils::escape($book["quantity"]);

                $totalPrice += $price * $quantity;

                require("components/basket-row.php");


            }

            require("components/basket-footer.php");
        } else{
            require("components/basket-empty.php");
        }
    }

    public static function searchArticleName($title){
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getArticleSearchResult);
        $stmt->execute(['%'.$title.'%']);
        $articles = $stmt->fetchAll();
        
        $conn = null;

        return $articles;
    }
}