<?php

require("classes/components.php");

Components::pageHeader("Contact Us", ["style"], ["mobile-nav"]);

$output = "";


?>

<div class="contact-form-container">
    <h1>Get in touch</h1>
    
    <form
        method="POST"
        action="<?php echo $_SERVER["PHP_SELF"];?>"
        class="form">
    
        <label>Your Name</label>
        <input
            type="text"
            name="name"
            value="<?php
    
            if($output && isset($_POST["loginSubmit"]) && isset($_POST["name"])){
                echo Utils::escape($_POST["name"]);
            }
    
            ?>"
        >
    
        <label>Your Email Address</label>
        <input
            type="text"
            name="email"
            value="<?php
    
            if($output && isset($_POST["loginSubmit"]) && isset($_POST["email"])){
                echo Utils::escape($_POST["email"]);
            }
    
            ?>"
        >
    
    
    
    
        <label>Write your message</label>
        <textarea name="message">
            <?php
            if ($output && isset($_POST["submit"]) && isset($_POST["message"])) {
                echo Utils::escape($_POST["message"]);
            }
            ?>
        </textarea>
    
        <input class="button contact-submit-button" type="submit" name="contactSubmit" value="Send">
    
        <?php if ($output && isset($_POST["loginSubmit"])) { echo $output; } ?>
    </form>
</div>

<div class="contact-map-container">
    <iframe width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=-2.993334531784058%2C56.49000188262805%2C-2.9796874523162846%2C56.49539753638916&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=17/56.49270/-2.98651">View Larger Map</a></small>
</div>


