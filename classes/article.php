<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

class Article{
    public static function searchArticleName($title){
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getArticleSearchResult);
        $stmt->execute($title);
        $articles = $stmt->fetchAll();
        
        $conn = null;

        return $articles;
    }
}