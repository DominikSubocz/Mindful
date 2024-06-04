<?php

class Components {
    public static function pageHeader($pageTitle, $stylesheets, $scripts){
        require("components/header.php");

    }

    public static function adminHeader($pageTitle, $stylesheets, $scripts){
        require("components/admin-header.php");

    }

    public static function pageFooter(){
        require("components/footer.php");
    }

    public static function allBooks($books){
        if(!empty($books)){

            foreach($books as $book){
                $bookId = Utils::escape($book["book_id"]);
                $title = Utils::escape($book["title"]);
                $author = Utils::escape($book["author"]);
                $price = Utils::escape($book["price"]);
                $filename = Utils::escape($book["filename"]);
                $tags = Utils::escape($book["tags"]);

                require("components/book-card.php");
            }


        }

        else{
            require("components/no-books-found.php");
        }
    }



    public static function latestPosts($books){
        $count = 0; // Initialize a counter to keep track of the number of books displayed

        if(!empty($books)){
            foreach($books as $book){
                if ($count >= 6) {
                    break; // Exit the loop once three books have been displayed
                }
                
                $bookId = Utils::escape($book["book_id"]);
                $title = Utils::escape($book["title"]);
                $author = Utils::escape($book["author"]);
                $price = Utils::escape($book["price"]);
                $filename = Utils::escape($book["filename"]);
                $tags = Utils::escape($book["tags"]);

        
                require("components/book-card.php");
                
                $count++; // Increment the counter after displaying each book
            }
        }

        else{
            require("components/no-books-found.php");
        }
    }

    public static function singleBook($book){
        if(!empty($book)){
            $bookId = Utils::escape($book["book_id"]);
            $title = Utils::escape($book["title"]);
            $author = Utils::escape($book["author"]);
            $price = Utils::escape($book["price"]);
            $filename = Utils::escape($book["filename"]);
            require("components/book-single.php");

        }
        else{
            require("components/no-books-found.php");
        }
    }

    public static function singleBookCard($book){
        if(!empty($book)){
            $bookId = Utils::escape($book["book_id"]);
            $title = Utils::escape($book["title"]);
            $author = Utils::escape($book["author"]);
            $price = Utils::escape($book["price"]);
            $filename = Utils::escape($book["filename"]);
            require("components/book-card.php");

        }
        else{
            require("components/no-books-found.php");
        }
    }

    public static function basketTable($booksArray){
        $userId = $_SESSION["user_id"];

        if(!empty($booksArray)){
            $totalPrice = 0;

            require("components/basket-header.php");

            foreach($booksArray as $book){
                $currentId = Utils::escape($book["book_id"]);
                $title = Utils::escape($book["title"]);
                $author = Utils::escape($book["author"]);
                $price = Utils::escape($book["price"]);
                $quantity = Utils::escape($book["quantity"]);

                $totalPrice += $price * $quantity;

                require("components/basket-row.php");

            }
            require("components/basket-footer.php");
        } else {
            require("components/basket-empty.php");
        }
    }

    public static function orderList($userId, $orders){
        if(!empty($orders)){
            $previousOrderid = -1;

            foreach($orders as $order){
                $orderId = Utils::escape($order["order_id"]);
                $bookId = Utils::escape($order["book_id"]);
                $quantity = Utils::escape($order["quantity"]);
                $orderDate = Utils::escape($order["order_date"]);
                $title = Utils::escape($order["title"]);
                $author = Utils::escape($order["author"]);
                $price = Utils::escape($order["price"]);
                $filename = Utils::escape($order["filename"]);

                if($orderId === $previousOrderid){
                    require("components/order-row.php");

                } else {
                    if($previousOrderid > -1){
                        echo "</div>";
                    }

                    echo "<div class='order-group'>";

                    $previousOrderid = $orderId;

                    $totalPrice = User::getTotalOrderPrice($userId, $orderId);

                    require("components/order-head.php");
                    require("components/order-row.php");
                } 
            }

            echo "</div>";
        } else {
            require("components/no-orders-found.php");
        }
    }

    public static function singleLink($page){

        require("components/link-single.php");
    }
}