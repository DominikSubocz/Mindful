<?php

require("classes/components.php");

Components::pageHeader("Discover", ["style","font-awesome.min"], ["mobile-nav"]);

?>

<div class="discover-content">
    <div>
        <h1>Discover Mindful</h1>
        <p>
            Pause, breathe, notice. Embrace each moment with mindful
            presence and gentle awareness.
        </p>
    </div>

    <img class="discover-content-img" src="images/quirky-eye-looking-through-magnifying-glass-1.png" alt="Eye looking through magnifying glass">
</div>

<div class="discover-steps steps-holder card-container">

    <div class="steps-container">
        <div class="step-card step-one">
            <img src="images/coworking-woman-working-on-laptop.png" alt="Woman sitting meditating at home."
                class="step-card-img">
            <h2>Find Event</h2>
            <p>
                From art shows to yoga classes,
                discover events that spark joy.
            </p>
        </div>
        <div class="step-card step-two">
            <img src="images/coworking-greetings-in-online-business-meeting.png" alt="Two friends meeting, having a coffe."
                class="step-card-img">
            <h2>Meet People</h2>
            <p>
                Share stories, and build meaningful
                connections at community gatherings.
            </p>
        </div>
        <div class="step-card step-three">
            <img src="images/active-young-woman-using-geolocation-and-creating-route.png" alt="Man sitting on a couch watching TV."
                class="step-card-img">
            <h2>Create Events</h2>
            <p>
                Share your passion, gather friends, and
                create unforgettable experiences together.
            </p>
        </div>
    </div>

</div>

<div class="event-cards-wrapper">
    <div class="event-wrapper-heading recent-events-heading">
        <h2>Recently Added Events </h2>
    </div>
    <div class="event-cards-container">
      <div>
        <article class="event-card">
          <figure class="event-card-img">
          <img src="images/rahadiansyah-dz1hrML7pmM-unsplash.jpg" />
          </figure>
          <div class="event-card-body">
          <div class="event-card-icons">
                <i class="fa fa-calendar" aria-hidden="true"></i><p>June 20, 2024</p>

                <i class="fa fa-map-marker" aria-hidden="true"></i><p>Dundee, UK</p>
            </div>
            <h2 class="event-card-title">Wall Climbing</h2>
            <p class="card-text">Join us on a nice game of table tennis at Perth.</p>
            <div class="event-card-buttons">
                <a href="#" class="button-gold"> Join Event </a>
                <a href="#" class="button-outline"> Learn More </a>
            </div>
          </div>
          
        </article>
      </div>
    
      <div>
        <article class="event-card">
          <figure class="event-card-img">
          <img src="images/martin-magnemyr-nGt71kRwUOw-unsplash.jpg" />
          </figure>
          <div class="event-card-body">
          <div class="event-card-icons">
                <i class="fa fa-calendar" aria-hidden="true"></i><p>June 22, 2024</p>

                <i class="fa fa-map-marker" aria-hidden="true"></i><p>Inverness, UK</p>
            </div>
            <h2 class="event-card-title">Cycling</h2>
            <p class="card-text">Come and join us on a exercise session at Dundee.</p>
            <div class="event-card-buttons">
                <a href="#" class="button-gold"> Join Event </a>
                <a href="#" class="button-outline"> Learn More </a>
            </div>
          </div>
        </article>
      </div>
    
      <div>
        <article class="event-card">
          <figure class="event-card-img">
          <img src="images/alexander-ross-myeQ2RH1PX0-unsplash.jpg" />
          </figure>
          <div class="event-card-body">
          <div class="event-card-icons">
                <i class="fa fa-calendar" aria-hidden="true"></i><p>June 24, 2024</p>

                <i class="fa fa-map-marker" aria-hidden="true"></i><p>Stirling, UK</p>
            </div>
            <h2 class="event-card-title">Zoo Trip</h2>
            <p class="card-text">Two day camping at Newtyle amidst wilderness.</p>
            <div class="event-card-buttons">
                <a href="#" class="button-gold"> Join Event </a>
                <a href="#" class="button-outline"> Learn More </a>
            </div>
          </div>
        </article>
    
      </div>
      <div>
        <article class="event-card">
          <figure class="event-card-img">
          <img src="images/amy-leigh-barnard-H3APOiYLyzk-unsplash.jpg" />
          </figure>
          <div class="event-card-body">
            <div class="event-card-icons">
                <i class="fa fa-calendar" aria-hidden="true"></i><p>June 28, 2024</p>

                <i class="fa fa-map-marker" aria-hidden="true"></i><p>Edinburgh, UK</p>
            </div>
            <h2 class="event-card-title">Museum Trip</h2>
            <p class="card-text">Two day camping at Newtyle amidst wilderness</p>
            <div class="event-card-buttons">
                <a href="#" class="button-gold"> Join Event </a>
                <a href="#" class="button-outline"> Learn More </a>
            </div>
          </div>
        </article>
        </div>
    </div>
</div>

<div class="event-cards-wrapper">
    <div class="event-wrapper-heading">
        <h2>June 2024</h2>
        <div class="month-buttons">
          <form
            method="POST"
            action="<?php echo $_SERVER["PHP_SELF"]; ?>"
            class="form months-form"
            >

            <input class="button-gold" type="submit" name="backSubmit" value="Back">
            <input class="button-outline" type="submit" name="currentSubmit" value="Current">
            <input class="button-gold" type="submit" name="nextSubmit" value="Next">
          </form>
    </div>
    <hr>
    <div class="event-cards-container">
      <div>
        <article class="event-card">
          <figure class="event-card-img">
          <img src="images/rahadiansyah-dz1hrML7pmM-unsplash.jpg" />
          </figure>
          <div class="event-card-body">
          <div class="event-card-icons">
                <i class="fa fa-calendar" aria-hidden="true"></i><p>June 20, 2024</p>

                <i class="fa fa-map-marker" aria-hidden="true"></i><p>Dundee, UK</p>
            </div>
            <h2 class="event-card-title">Wall Climbing</h2>
            <p class="card-text">Join us on a nice game of table tennis at Perth.</p>
            <div class="event-card-buttons">
                <a href="#" class="button-gold"> Join Event </a>
                <a href="#" class="button-outline"> Learn More </a>
            </div>
          </div>
          
        </article>
      </div>
    
      <div>
        <article class="event-card">
          <figure class="event-card-img">
          <img src="images/martin-magnemyr-nGt71kRwUOw-unsplash.jpg" />
          </figure>
          <div class="event-card-body">
          <div class="event-card-icons">
                <i class="fa fa-calendar" aria-hidden="true"></i><p>June 22, 2024</p>

                <i class="fa fa-map-marker" aria-hidden="true"></i><p>Inverness, UK</p>
            </div>
            <h2 class="event-card-title">Cycling</h2>
            <p class="card-text">Come and join us on a exercise session at Dundee.</p>
            <div class="event-card-buttons">
                <a href="#" class="button-gold"> Join Event </a>
                <a href="#" class="button-outline"> Learn More </a>
            </div>
          </div>
        </article>
      </div>
    
      <div>
        <article class="event-card">
          <figure class="event-card-img">
          <img src="images/alexander-ross-myeQ2RH1PX0-unsplash.jpg" />
          </figure>
          <div class="event-card-body">
          <div class="event-card-icons">
                <i class="fa fa-calendar" aria-hidden="true"></i><p>June 24, 2024</p>

                <i class="fa fa-map-marker" aria-hidden="true"></i><p>Stirling, UK</p>
            </div>
            <h2 class="event-card-title">Zoo Trip</h2>
            <p class="card-text">Two day camping at Newtyle amidst wilderness.</p>
            <div class="event-card-buttons">
                <a href="#" class="button-gold"> Join Event </a>
                <a href="#" class="button-outline"> Learn More </a>
            </div>
          </div>
        </article>
    
      </div>
      <div>
        <article class="event-card">
          <figure class="event-card-img">
          <img src="images/amy-leigh-barnard-H3APOiYLyzk-unsplash.jpg" />
          </figure>
          <div class="event-card-body">
            <div class="event-card-icons">
                <i class="fa fa-calendar" aria-hidden="true"></i><p>June 28, 2024</p>

                <i class="fa fa-map-marker" aria-hidden="true"></i><p>Edinburgh, UK</p>
            </div>
            <h2 class="event-card-title">Museum Trip</h2>
            <p class="card-text">Two day camping at Newtyle amidst wilderness</p>
            <div class="event-card-buttons">
                <a href="#" class="button-gold"> Join Event </a>
                <a href="#" class="button-outline"> Learn More </a>
            </div>
          </div>
        </article>
        </div>
    </div>
</div>
