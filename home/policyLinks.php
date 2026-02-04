<?php
session_start();
include('../home/db.php');
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
    <meta charset="UTF-8"><script src="/htdocs/home/mainAccess.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="temp.css">
    <link rel="stylesheet" href="temp-media.css">
    <link rel="stylesheet" href="constants.css">
    <script src="utilis.js" defer></script>
    <style>
        .textual {
            width: 100%;
        }

        main .heading-policy {
            font-size: clamp(1rem, 6vw, 2rem);
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Navigation Section : MAin HEader -->
    <header>
        <!-- Top banner with search bar -->
        <section class="banner">
            <div class="logo">
                <img src="../images/RZA-images/logo.svg" alt="RZA Logo" style="cursor: pointer;">
            </div>
            <div class="items">
                <div class="search">
                    <img src="../images/RZA-images/searchIcon.svg" alt="Search Icon">
                    <input type="text" id="search" placeholder="Enter a Search Item...">
                </div>
                <div class="actions">
                    <div class="action-btn">
                        <a class="make-booking btn btn-warning" href="../bookings/safari-tickets/index.php">Safari Right Now</a>
                    </div>

                    <?php

                    // Dont display sign up and login buttons if logged in
                    
                        if($_SESSION['login']){
                            echo '<a href="../customers/login-main/profile.php"  class="btn btn-success">' . $_SESSION['firstName'] . '</a>';
                        }else{
                            echo '<div class="action-btn">
                        <a class="login btn btn-success" href="../customers/login-main/index.html">Login</a>
                    </div>
                    <div class="action-btn">
                        <a class="new-account btn btn-success" href="../customers/registration-main/index.html">Sign Up</a>
                    </div>';
                        }

                    ?>
                    <!-- <div class="action-btn">
                        <a class="login btn btn-success" href="../customers/login-main/index.html">Login</a>
                    </div>
                    <div class="action-btn">
                        <a class="new-account btn btn-success" href="../customers/registration-main/index.html">Sign Up</a>
                    </div> -->

                </div>
                <div class="nav-btn">
                    <img src="../images/menu.png" id="nav-btn">
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
                    <a href="../home/index.php" class="home-link">Home</a>
                </div>
                <a href="../bookings/safari-tickets/index.php">Book a Safari Ticket</a>
                <a href="../bookings/hotel-tickets/index.php">Book a Night in Hotel</a>
                <a href="../home/termsAndCs.php">Terms and Conditions</a>

                <!-- <a href="../customers/login-main/index.html">Login</a> -->
                <?php
                // Dont Display Login Button if already logged in
                if($_SESSION['login']){
                    echo '<a href="../customers/login-main/logout.php" class="log-out" style="background-color: white;text-align: center;">Log Out</a>';
                }else{
                    echo '<a href="../customers/login-main/index.html">Login</a>';
                    echo '<a href="../customers/registration-main/index.html">Create Account</a>';
                }


                ?>

                <a href="../customers/accessibility/index.php">Accessebility Settings</a>
                <a href="../home/policyLinks.php">All Legal : RZA</a>
                <a href="../home/contact.php">Report an Issue</a>
            </div>
        </nav>

    </header>

    <hr>
    <!-- Main section for all content -->
    <main>

        <h1 style="width: 100%; text-align: center;">Ridget Zoo Adventures : Terms and Conditions</h1>
        <section class="text-content">
            <div class="textual">

                <br><br>
                <p class="heading-policy" id="privacy">
                    <span class="orange bold">Privacy Policy</span>
                </p>
                <hr>
                <p>
                    Ridget Zoo Adventures is committed to protecting the privacy and personal information of all
                    visitors, participants, and partners. Any personal data collected through ticket purchases,
                    educational registrations, online forms, or safari bookings is used solely for operational,
                    educational, and communication purposes. The zoo does not sell or share personal information with
                    third parties except where required by law or for essential service delivery. Reasonable security
                    measures are in place to safeguard personal data, and visitors may request access to or correction
                    of their information in accordance with applicable privacy regulations.
                    <br><br>
                <p class="heading-policy" id="environmental">
                    <span class="orange bold">Environemntal Policy</span>
                </p>
                <hr>
                <p>
                    Ridget Zoo Adventures is dedicated to environmental stewardship, wildlife conservation, and
                    sustainable tourism practices. The zoo actively works to minimize its environmental impact by
                    conserving natural habitats, reducing waste, promoting recycling, and using eco-friendly resources
                    wherever possible. Educational programs and safari experiences are designed to foster respect for
                    wildlife and raise awareness about biodiversity conservation. All operations prioritize animal
                    welfare and environmental responsibility to ensure a positive impact on both local ecosystems and
                    future generations.
                    <br><br>

                <p class="heading-policy" id="customer">
                    <span class="orange bold">Customer Policy</span>
                </p>
                <hr>
                <p>
                    Ridget Zoo Adventures strives to provide a safe, educational, and enjoyable experience for all
                    guests. Visitors are expected to follow all safety guidelines, staff instructions, and posted rules
                    during zoo visits and safari activities. The zoo reserves the right to refuse service or remove
                    guests whose behavior is disruptive or unsafe. Feedback, concerns, or complaints should be directed
                    to zoo management in a timely manner so they can be addressed professionally and fairly. By using
                    zoo services, guests agree to abide by all applicable policies to help maintain a respectful and
                    welcoming environment.
                    <br><br>
                </p>
            </div>
        </section>
        <br><br>

    </main>
    <hr>

    <!-- Footer Section : constant on all pages -->
    <footer>
        <div class="col-1">
            <h4>Where can you Find Us</h4>
            <div class="addrr">
                <img src="../images/RZA-images/addressFooter.png" alt="Address Icon">
                <p>Address</p>
                <p>Head Qaurters Addess</p>
            </div>
        </div>

        <div class="col-2">
            <h4>Policy Links</h4>
            <div class="links">
                <a href="../home/policyLinks.html#privacy">Privacy Policy</a>
                <a href="../home/policyLinks.html#environmental">Environmental Policy</a>
                <a href="../home/policyLinks.html#customer">Customer Policy</a>
            </div>
        </div>

        <div class="col-3">
            <h4>About This Website</h4>
            <p>
                The fist man to walk on the earth was Martin Juniour - That was because he didnt know Satoru Gojo
            </p>
        </div>

        <div class="accessebility">
            <a href="../customers/accessibility/index.html"><img src="../images/RZA-images/access.svg"
                    alt="Accessibility Icon"></a>
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