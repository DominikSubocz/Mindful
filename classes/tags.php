<?php

require_once("classes/connection.php");
require_once("classes/sql.php");
require_once("classes/utils.php");

class Tags{
    public static function getAllTags(){
        $conn = Connection::connect();

        $stmt = $conn->prepare(SQL::$getAllTags);
        $stmt->execute();
        $tags = $stmt->fetchAll();

        $conn = null;

        return $tags;


    }
}