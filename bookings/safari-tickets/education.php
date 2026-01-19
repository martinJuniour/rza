<?php
session_start();
include("../../home/db.php");
// Log 'Login' Error
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = false;
}
// if($db){
//     echo 'Atty';
// }else{
//     echo 'Not yet';
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../../home/constants.css">
        <link rel="stylesheet" href="../../home/temp.css">
        <link rel="stylesheet" href="../../home/temp-media.css">
    <script src="utilis.js" defer></script>
</head>

<body>

    <!-- Navigation Section : MAin HEader -->
    <header>
        <!-- Top banner with search bar -->
        <section class="banner">
            <div class="logo">
                <img src="../../images/RZA-images/logo.svg" alt="RZA Logo" style="cursor: pointer;">
            </div>
            <div class="items">
                <div class="search">
                    <img src="../../images/RZA-images/searchIcon.svg" alt="Search Icon">
                    <input type="text" id="search" placeholder="Enter a Search Item...">
                </div>
                <div class="actions">
                    <div class="action-btn">
                        <a class="make-booking btn btn-warning" href="index.php">Safari Right Now</a>
                    </div>

                    <?php

                    // Dont display sign up and login buttons if logged in
                    
                        if($_SESSION['login']){
                            echo '<a href="../../customers/login-main/profile.php"  class="btn btn-success">' . $_SESSION['firstName'] . '</a>';
                        }else{ 
                            echo '<div class="action-btn">
                        <a class="login btn btn-success" href="../../customers/login-main/index.html">Login</a>
                    </div>
                    <div class="action-btn">
                        <a class="new-account btn btn-success" href="../../customers/registration-main/index.html">Sign Up</a>
                    </div>';
                        }

                    ?>

                </div>
                <div class="nav-btn">
                    <img src="../../images/menu.png" id="nav-btn" alt="navigation icon">
                </div>
            </div>
        </section>
        <!-- main nav bar -->
        <nav>
            <div class="cancel">
                <p id="close-nav">
                    →
                </p>
            </div>
            <div class="nav-items">

                <div class="home">
                    <a href="../../home/index.php" class="home-link">Home</a>
                </div>
                <a href="index.php">Book a Safari Ticket</a>
                <a href="../hotel-tickets/index.php">Book a Night in Hotel</a>
                <a href="../../home/termsAndCs.php">Terms and Conditions</a>

            
                <?php
                // Dont Display Login Button if already logged in
                if($_SESSION['login']){
                    echo '<a href="../../customers/login-main/logout.php" class="log-out" style="background-color: white;text-align: center;">Log Out</a>';
                }else{
                    echo '<a href="../../customers/login-main/index.html">Login</a>';
                    echo '<a href="../../customers/registration-main/index.html">Create Account</a>';
                }


                ?>

                <a href="../../customers/accessibility/index.php">Accessebility Settings</a>
                <a href="../../home/policyLinks.php">All Legal : RZA</a>
                <a href="../../home/contact.php">Report an Issue</a>
            </div>
        </nav>

    </header>

    <hr>
    <!-- Main section for all content -->
    <main>

        <section class="promotion">
            <div class="main-banner">
                <h2><span class="bold">Bringing your </span> <span class="green">class </span><span class="white bold">over </span>?</h2>
            </div>
        </section>


        <section class="text-content">
            <div class="textual">
                <h3>What we provide for your Class... <br><br><mark><span class="white">READ-ME</span></mark></h3>
                <br><br>
                <p>
                    Welcome to <span class="orange bold">Ridget Zoo Adventures</span>, your quick gateway to wildlife,
                    family
                    fun, and an unforgettable day out. If
                    you’re visiting for the first time, the top menu is the easiest way to get around—use it to jump
                    straight to Safari Tickets or Your account Profile. When you’re ready to book,
                    choosing <span class="bold">Make a Booking</span> will take you directly to ticket options, add-ons,
                    and available dates.
                    <br><br>
                    <mark><span class="green">Creating an account</span></mark> is one of the best ways to make your
                    experience smoother. When you’re signed in,
                    you can book faster because your details can be saved for future visits, meaning fewer steps at
                    checkout. Having an account also helps us improve our service to you over time, because it supports
                    a more personalised experience—like more relevant updates, easier repeat bookings, and better
                    planning tools based on what visitors use most. From time to time, account holders may also be
                    included in special offers and discount draws, giving you a chance to save on tickets, experiences,
                    or selected extras.
                    <br><br>
                    To plan your day properly, head to Plan Your Visit for the key essentials such as opening times,
                    accessibility information, facilities, and what to bring. Then, use the Zoo Map to navigate
                    confidently once you arrive—whether you’re looking for specific habitats, cafés, rest areas, or
                    family-friendly stops. Finally, don’t miss our makeshift pop-up events, which can include keeper
                    talks, feeding times, mini trails, and weekend activity zones that appear on selected days. Check
                    the Events page for the latest schedule, and you’ll be able to build a simple route through the zoo
                    that fits your time, energy, and interests.
                </p>

                <section class="imaging">
                    <img src="../images/R.jfif" alt="A lion">
                    <img src="../images/R.jfif" alt="A lion">
                    <img src="../images/R.jfif" alt="A lion">
                    <img src="../images/R.jfif" alt="A lion">
                </section>
            </div>
            <div class="bordered">
                <div class="faq">
                    <div class="faq-img-content">
                        <img src="../images/RZA-images/koala.svg" alt="Koala icon" class="k-icon">
                        <h4>
                            Get to be a leader
                        </h4>
                    </div>
                    <img src="../../images/RZA-images/captivating.jpg" alt="">
                </div>
                <hr>
                <div class="faq">
                    <div class="faq-img-content">
                        <img src="../images/RZA-images/koala.svg" alt="Koala icon" class="k-icon">
                        <h4> I heard about a hotel </h4>
                    </div>
                    <ul>
                        <li>
                            <p>
                                Perfect. You heard right. RZA provides a highly rated (5 Star) safari themed lodge at
                                low
                                prices. If you're keen to sleep under the moonlight <a href="">begin your booking right
                                    here</a>.
                            </p>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="image-capture">
                    <img src="../images/RZA-images/hotel2.jpg" alt="A hotel Stay in">
                </div>
                <hr>
                <div class="bordered-btn">
                    <button class="btn btn-warning">I'm ready to Tour</button>
                </div>
            </div>
        </section>

    </main>
    <hr>

    <!-- Footer Section : constant on all pages -->
    <footer>
        <div class="col-1">
            <h4>Where can you Find Us</h4>
            <div class="addrr">
                <img src="../../images/RZA-images/addressFooter.png" alt="Address Icon">
                <p>Address</p>
                <p>Head Qaurters Addess</p>
            </div>
        </div>

        <div class="col-2">
            <h4>Policy Links</h4>
            <div class="links">
                <a href="../../home/policyLinks.php#privacy">Privacy Policy</a>
                <a href="../../home/policyLinks.php#environmental">Environmental Policy</a>
                <a href="../../home/policyLinks.php#customer">Customer Policy</a>
            </div>
        </div>

        <div class="col-3">
            <h4>About This Website</h4>
            <p>
                The fist man to walk on the earth was Martin Juniour - That was because he didnt know Satoru Gojo
            </p>
        </div>

        <div class="accessebility">
            <a href="../../customers/accessibility/index.php"><img src="../../images/RZA-images/access.svg" alt="Accessibility Icon"></a>
            <h4>Accessebility</h4>
            <p>
                Finally, don’t miss our makeshift pop-up events, which can include keeper
                talks, feeding times, mini trails, and weekend activity zones that appear on selected days. Check
                the Events page for the latest schedule, and you’ll be able to build a simple route through the zoo
                that fits your time, energy, and interests.
            </p>
        </div>

    </footer>

</body>

</html>