<?php

session_start();

require("classes/components.php");

require("classes/utils.php");

if(isset($_SESSION["loggedIn"])){
    header("Location: " . Utils::$projectFilePath . "/book-list.php");
    
}

$output = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    require("classes/user.php");


    if(isset($_POST["loginSubmit"])){
        $output = User::login();

        if(!$output){
            header("Location: " . Utils::$projectFilePath . "/book-list.php");
        }
        }
}

Components::pageHeader("Login", ["style"], ["mobile-nav"]);

?>

<div class="authentication-container login-page-container">
    <div class="login-container">
        <h2>Log in to an existing account</h2>
    
        <form
            method="POST"
            action="<?php echo $_SERVER["PHP_SELF"];?>"
            class="form">
    
                <label>Username</label>
                <input
                    type="text"
                    name="username"
                    value="<?php
    
                    if($output && isset($_POST["loginSubmit"]) && isset($_POST["username"])){
                        echo Utils::escape($_POST["username"]);
                    }
    
                    ?>"
                >
    
                <label>Password</label>
                <input type="password" name="password">
    
                <input class="button" type="submit" name="loginSubmit" value="Log in">
    
                <?php if ($output && isset($_POST["loginSubmit"])) { echo $output; } ?>
        </form>
    </div>
    
</div>


<?php

Components::pageFooter();

?>