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

        <div class="search-form-container">
            <input type="text" name="location" placeholder="Search articles" value="<?php echo $location;?>">
            <input class="button" type="submit" name="searchSubmit" value="Search">
        </div>


    </form>

</div>

<div class="index-steps-container">
    <div class="step-card step-one">
        <img src="images/isometric-woman-meditating-at-home.png" alt="Woman sitting meditating at home." class="step-card-img">
        <h2>Step 1</h2>
        <p>Find relevant articles. Type in
            keywords or browse through 
            categories to discover insights for
        </p>
    </div>
    <div class="step-card step-two">
        <img src="images/bendy-meeting-of-two-friends.png" alt="Two friends meeting, having a coffe." class="step-card-img">
        <h2>Step 2</h2>
        <p>Save your favourite articles. Keep
            track of your progress and revisit
            them whenever you need a boost.
        </p>
    </div>
    <div class="step-card step-three">
        <img src="images/isometric-man-watching-tv-at-home.png" alt="Man sitting on a couch watching TV." class="step-card-img">

        <h2>Step 3</h2>
        <p>Connect with the Mindful 
            comminuty. Share your thoughts
            and experiences with like-minded.
        </p>
    </div>

</div>

<br><br>