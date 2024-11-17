<?php
    require("classes/sql.php");
    require("classes/connection.php");
    require("classes/book.php");

        $id = $_GET['id'];

        $conn = Connection::connect();
            
        $post = Book::getPostInfoById($id);   
    
        $postArr = array ('heading' => $post['heading'], 'sub_heading' => $post['sub_heading'], 'content' => $post['content']);

        header('Content-Type: application/json');
        echo json_encode($postArr);


    
    
?>