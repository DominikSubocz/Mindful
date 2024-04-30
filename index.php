<?php

session_start();

require ("classes/components.php");

Components::pageHeader("Login", ["style"], ["mobile-nav"]);

$location = "";

?>

<div class="index-content">
    <div class="index-img-parent-container">
        <img src="images/dizzy-video-call.png" alt="Cover of woman chatting with a man thru phone."
            class="home-img home-hero-img1">
    </div>
    <div class="index-img-parent-container">
        <img src="images/juicy-young-woman-sitting-in-lotus-position-1.png" alt="Woman with ginger hair sitting medidating."
            class="home-img home-hero-img2">
    </div>


    <h1>Discover insights for your mental well-being</h1>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form">

        <div class="search-form-container">
            <input type="text" name="location" placeholder="Search articles" value="<?php echo $location; ?>">
            <input class="button" type="submit" name="searchSubmit" value="Search">
        </div>


    </form>

</div>

<div class="index-steps index-card-container">
    <div class="index-steps-heading">
        <h2>Explore Mindful Topics</h2>
    </div>

    <div class="index-steps-container">
        <div class="step-card step-one">
            <img src="images/isometric-woman-meditating-at-home.png" alt="Woman sitting meditating at home."
                class="step-card-img">
            <h2>Step 1</h2>
            <p>Find relevant articles. Type in
                keywords or browse through
                categories to discover insights for
            </p>
        </div>
        <div class="step-card step-two">
            <img src="images/bendy-meeting-of-two-friends.png" alt="Two friends meeting, having a coffe."
                class="step-card-img">
            <h2>Step 2</h2>
            <p>Save your favourite articles. Keep
                track of your progress and revisit
                them whenever you need a boost.
            </p>
        </div>
        <div class="step-card step-three">
            <img src="images/isometric-man-watching-tv-at-home.png" alt="Man sitting on a couch watching TV."
                class="step-card-img">
            <h2>Step 3</h2>
            <p>Connect with the Mindful
                comminuty. Share your thoughts
                and experiences with like-minded.
            </p>
        </div>
    </div>

</div>

<div class="index-benefits index-card-container">
    <div class="index-steps-heading">
            <h2>Benefits of Mindful</h2>
    </div>

    <div class="index-steps-container">
        <div class="step-card step-one">
            <img src="images/tiny-people-talking-near-the-cooler-in-the-office.png" alt="Woman sitting meditating at home."
                class="step-card-img">
            <div>
                <h2>Enhanced Emotional Well-being</h2>
                <p>
                    By practicing mindfulness techniques such as meditation and deep breathing, you can cultivate greater self-awareness and emotional resilience.
                </p>
                <a href="#" class="button">Learn More</a>
            </div>

        </div>
        <div class="step-card step-two">
            <img src="images/clip-966.png" alt="Two friends meeting, having a coffe."
                class="step-card-img">
            <div>
                <h2>Improved Cognitive Function</h2>
                <p>
                    By focusing attention and reducing mental clutter, mindfulness practice can improve concentration, memory, and decision-making abilities.
                </p>
                <a href="#" class="button">Learn More</a>
            </div>
        </div>
        <div class="step-card step-three">
            <img src="images/boba-check-in.png" alt="Man sitting on a couch watching TV."
                class="step-card-img">
            <div>
                <h2>Physical Health Benefits</h2>
                <p>
                    Embracing mindfulness as part of a holistic wellness routine can lead to a healthier, more balanced life.
                </p>
                <a href="#" class="button">Learn More</a>
            </div>
        </div>
    </div>
</div>

<div class="index-app index-card-container">
    <div class="index-steps-heading">
        <h2>Download Our App</h2>
    </div>

    <div class="index-steps-container">
        <div class="step-card step-one">
            <img src="images/isometric-woman-meditating-at-home.png" alt="Woman sitting meditating at home." class="step-card-img">
            <h2>Read Mindful Everywhere</h2>
            <p>
                Access a wealth of articles on mental health and well-being.
                Expand your knowledge and prectice mindfulness with Mindful.
            </p>
            <a href="#" class="button">Download</a>

        </div>
    </div>
</div>

<?php

Components::pageFooter();

?>

