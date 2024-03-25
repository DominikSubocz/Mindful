<?php

session_start();

require("classes/components.php");

Components::pageHeader("Login", ["style"], ["mobile-nav"]);

$location = "";

?>

<div class="index-content"> 
    <img src="images/dizzy-video-call.png" alt="Cover of woman chatting with a man thru phone." class="home-img home-hero-img1">
    <img src="images/juicy-young-woman-sitting-in-lotus-position-1.png" alt="Woman with ginger hair sitting medidating." class="home-img home-hero-img2">


    <h1>Discover insights for your mental well-being</h1>

    <form
        method="POST"
        action="<?php echo $_SERVER["PHP_SELF"];?>"
        class="form">

        <div>
            <input type="text" name="location" placeholder="Search articles" value="<?php echo $location;?>">
            <input class="button" type="submit" name="searchSubmit" value="Search">
        </div>


    </form>

</div>