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
        } else if (isset($_POST["registerSubmit"])){
            $output = User::register();

        if(!$output) {
            header("Location: " . Utils::$projectFilePath . "/registration-success.php");

        }
    }
}

Components::pageHeader("Login", ["style"], ["mobile-nav"]);

?>

<div class="authentication-container">
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
    
    <hr>
    
    <div class="register-container">
        <h2> Register a new account</h2>
    
        <form
            method="POST"
            action="<?php echo $_SERVER["PHP_SELF"];?>"
            class="form">
    
            <label for="username">Username</label>
            <input
                type="text"
                name="username"
                id="username"
                value="<?php
                    if ($output && isset($_POST["registerSubmit"]) && isset($_POST["username"])) {
                        echo Utils::escape($_POST["username"]);
                    }
                ?>"
            >
    
            <label for="email">Email address</label>
            <input
                type="email"
                name="email"
                id="email"
                value="<?php
                    if ($output && isset($_POST["registerSubmit"]) && isset($_POST["email"])) {
                        echo Utils::escape($_POST["email"]);
                    }
                ?>"
            >
    
            <label for="passwordOne">Password</label>
            <input type="password" name="passwordOne" id="passwordOne">
    
            <label for="passwordTwo">Password (retype)</label>
            <input type="password" name="passwordTwo" id="passwordTwo">
    
            <input class="button" type="submit" name="registerSubmit" value="Register account">
    
            <?php if ($output && isset($_POST["registerSubmit"])) { echo $output; } ?>
        </form>
    </div>
</div>


<?php

Components::pageFooter();

?>