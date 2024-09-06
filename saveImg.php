<?php

$img = $_FILES['file']['name'];

$path = "images/".$img;

if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){
    echo 'Success';
} else {
    echo 'Failure';
}

?>