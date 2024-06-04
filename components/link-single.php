<?php 
$link = strtolower($page);

$link = str_replace(' ', '-', $link);

?>

<a href="<?php echo $link ?>.php"> <?php echo $page ?></a>