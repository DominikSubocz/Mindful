<?php

session_start();

require("classes/components.php");
require("classes/utils.php");
require("classes/book.php");

// if(!isset($_GET["id"]) || !is_numeric($_GET["id"])){
//     header("Location: " . Utils::$projectFilePath . "/book-list.php");
// } 

$articleName = "";
$searchPlaceholder = "Search Articles";
$sortType="";

$books = Book::searchArticleName($_GET["title"]);

$pageTitle = "Book not found";


if ($_SERVER["REQUEST_METHOD"] ==="POST" && isset($_POST["searchSubmit"])) {

    if(isset($_POST["sortType"])){
        var_dump($_POST["sortType"]);
    }

}

Components::pageHeader($pageTitle, ["style"], ["mobile-nav"]);
?>

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form">

<div class="search-form-container">
    <input type="text" name="article_name" placeholder="<?php echo $searchPlaceholder; ?>" value="<?php echo $articleName; ?>">
    <input class="button" type="submit" name="searchSubmit" value="Search">
</div>



<div class="dropdown">
    <input onclick="dropdownFunction()" id="dropbtn" class="dropbtn" type="button" value="Sort By: Relevancy">
        <div id="myDropdown" class="dropdown-content">
                <input onclick="changeDropBtnValue('Relevancy')" class="button" type="button" name="relevancySort" value="Relevancy">
                <input onclick="changeDropBtnValue('Oldest First')" class="button" type="button" name="oldestSort" value="Oldest First">
                <input onclick="changeDropBtnValue('Alphabetical (A-Z)')" class="button" type="button" name="alphabeticalSort" value="Alphabetical (A-Z)">

                <!-- <input onclick="changeDropBtnValue('Most Recent')" class="button" type="button" name="recentSort" value="Most Recent">
                <input onclick="changeDropBtnValue('Most Viewed')" class="button" type="button" name="viewSort" value="Most Viewed">
                <input onclick="changeDropBtnValue('Most Shared')" class="button" type="button" name="shareSort" value="Most Shared"> -->
                <input type="hidden" id="sortType" name="sortType" value="Relevancy">



        </div>
    </form>
</div>

<div class="book-list">
    
    
    <?php
    Components::allBooks($books);
    ?>
</div>
<script>
    dropBtn = document.getElementById("dropbtn");
    sortType = document.getElementById("sortType");

    function changeDropBtnValue(value){
        dropBtn.value = "Sort By: " + value;
        sortType.value = value;
    }
    function dropdownFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
</script>
<?php
Components::pageFooter();

?>