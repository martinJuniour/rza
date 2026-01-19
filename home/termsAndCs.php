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
    <meta charset="UTF-8">
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
       main  .heading-policy{
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
                <p class="heading-policy">
                    <span class="orange bold">Ridget Zoo Adventures</span> <b> Terms and Conditions document governs all visitors participating in educational programs,
                    guided tours, and safari experiences.</b> <br><br>
                </p>
                <hr>
                <p>
                    By entering the zoo premises, visitors agree to comply with all rules, policies, and safety
                    instructions provided by zoo staff.
                    The zoo reserves the right to modify operating hours, programs, or safari routes without prior
                    notice.
                    All educational services are designed to promote wildlife conservation, learning, and environmental
                    awareness.
                    Visitors must follow all posted signs and verbal instructions during zoo visits and safari
                    activities.
                    Children participating in educational programs must be supervised by a responsible adult or
                    authorized guardian.
                    The zoo is not responsible for personal belongings lost, damaged, or stolen on the premises.
                    Safari experiences may involve inherent risks associated with wildlife and outdoor environments.
                    Visitors acknowledge and accept all risks associated with animal encounters during safaris.
                    Feeding, touching, or provoking animals is strictly prohibited unless supervised by authorized
                    staff.
                    <br><br>
                    Photography and video recording are permitted for personal educational use only.
                    Commercial photography or filming requires prior written permission from zoo management.
                    The zoo may use photographs or recordings taken on-site for educational or promotional purposes.
                    Visitors must remain inside designated vehicles or paths during safari experiences.
                    Failure to follow safari safety rules may result in immediate removal without refund.
                    Educational sessions may be adjusted based on animal welfare and environmental conditions.
                    The zoo prioritizes animal health, safety, and ethical treatment at all times.
                    Any behavior that disrupts educational programs or endangers animals is prohibited.
                    Visitors must disclose any medical conditions that could affect participation in safari activities.
                    The zoo is not liable for injuries resulting from failure to follow safety instructions.
                    Refunds are not guaranteed for missed educational sessions due to late arrival.
                    The zoo reserves the right to refuse entry to anyone violating these terms.
                    Food, beverages, or items harmful to animals are not allowed in animal areas.
                    All visitors must comply with local laws and wildlife protection regulations.
                    Educational materials provided remain the intellectual property of the zoo.
                    Unauthorized distribution of educational content is prohibited.
                    Safari schedules may change due to weather or animal behavior.
                    The zoo is not responsible for delays caused by natural or unforeseen circumstances.
                    Visitors must wear appropriate clothing and footwear for safari and outdoor activities.
                    Smoking, alcohol, and illegal substances are strictly prohibited on zoo property.
                    Emergency procedures must be followed immediately when announced by staff.
                    Educational programs may include live demonstrations under professional supervision.
                    Animals may not always be visible during safari experiences.
                    <br><br>
                    The zoo does not guarantee sightings of specific animals.
                    Visitors must respect other guests and maintain appropriate behavior.
                    Noise levels must be kept low to avoid stressing animals.
                    The zoo may terminate educational services for rule violations.
                    These terms apply to all ticket holders regardless of age or group size.
                    Group visits must adhere to pre-approved educational schedules.
                    Visitors agree to indemnify the zoo against claims caused by negligence.
                    Any complaints must be reported to zoo management promptly.
                    Zoo staff have authority to enforce all rules and safety measures.
                    Accessibility accommodations are provided where reasonably possible.
                    Visitors must follow instructions during animal transportation or movement.
                    Educational safaris aim to simulate natural habitats responsibly.
                    The zoo may update these terms at any time without prior notice.
                    Continued use of zoo services implies acceptance of updated terms.
                    These terms ensure a safe, educational, and respectful experience for all.
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
            <a href="../customers/accessibility/index.html"><img src="../images/RZA-images/access.svg" alt="Accessibility Icon"></a>
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