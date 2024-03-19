<?php

session_start();

require("classes/components.php");
require("classes/book.php");

Components::pageHeader("All Books", ["style"], ["mobile-nav"]);

?>
<div class="articles-hero-container">
    <div class="articles-hero">
        <div class="articles-hero-overlay">
            <h2>Explore men's mental health</h2>
        </div>
        <div class="articles-hero-img-container">
            <img class="articles-hero-img" src="images/pexels-kelvin-valerio-810775.jpg">
        </div>
    
    </div>
</div>

<div class="article-list-container">
    <h2>Latest Articles</h2>
    
    <div class="articles-buttons-container">
            <span class="material-symbols-outlined article-arrow-left">
            chevron_left
            </span>
            <span class="material-symbols-outlined article-arror-right">
            chevron_right
            </span>
        </div>
    <div class="book-list">
    
    
        <?php
    
        $books = Book::getAllBooks();
        Components::latestPosts($books);
    
        ?>
    </div>
    
    <div class="trending-articles">
        <h2>Trending Articles</h2>
    
    
        <div class="book-list ">
    
            <!-- <div class="articles-buttons-container">
                <span class="material-symbols-outlined">
                chevron_left
                </span>
                <span class="material-symbols-outlined">
                chevron_right
                </span>
            </div> -->
            <?php
    
            $books = Book::getAllBooks();
            Components::latestPosts($books);
    
            ?>
        </div>
    </div>

    <div class="all-articles">
        <h2>All Articles</h2>
    
    
        <div class="book-list ">
    
            <!-- <div class="articles-buttons-container">
                <span class="material-symbols-outlined">
                chevron_left
                </span>
                <span class="material-symbols-outlined">
                chevron_right
                </span>
            </div> -->
            <?php
    
            $books = Book::getAllBooks();
            Components::allBooks($books);
            ?>


        </div>
    </div>
</div>

<?php

Components::pageFooter();

?>