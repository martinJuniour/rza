<?php
session_start();
include("../../home/db.php");
// Log 'Login' Error
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    header("Location : error.html");
}
$_SESSION['cancel'] = [];
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
    <link rel="stylesheet" href="../safari-tickets/congrats.css">
    <link rel="stylesheet" href="temp.css">
    <link rel="stylesheet" href="../../home/constants.css">
    <link rel="stylesheet" href="congrats-media.css">
    <script src="../../home/utilis.js" defer></script>
</head>

<body>

    <!-- Main section for all content -->
    <main class="hotelBooking">
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
                            <a class="make-booking btn btn-warning" href="../safari-tickets/index.php">Safari Right
                                Now</a>
                        </div>

                        <?php

                        // Dont display sign up and login buttons if logged in
                        
                        if ($_SESSION['login']) {
                            echo '<a href="../../customers/login-main/profile.php"  class="btn btn-success">' . $_SESSION['firstName'] . '</a>';
                        } else {
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
                    <a href="../safari-tickets/index.php">Book a Safari Ticket</a>
                    <a href="../../home/termsAndCs.php">Terms and Conditions</a>


                    <?php
                    // Dont Display Login Button if already logged in
                    if ($_SESSION['login']) {
                        echo '<a href="../../customers/login-main/logout.php" class="log-out" style="background-color: white;text-align: center;">Log Out</a>';
                    } else {
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

        <section class="done">
            <h1>Con<span class="green">grat</span>ulations <?php echo $_SESSION['firstName']; ?><span
                    class="orange">.</span></h1>
            <p>
                Your <span class="green">Hotel Booking was</span> successful.
                Below is your <span class="orange">reference number</span> for the hotel booking. You can always
                find this in your profile
                management Tab. See verification email for further details about
                cancellations and more.
            </p>
            <br><br>
            <div class="done">
                <p class="p">
                    <input type="text" value = "<?php echo $_SESSION['ref']; ?>" readonly>
                    <br>
                    <span class="copy">
                        <button class="btn btn-link">Copy to Clipboard</button>
                    </span>
                </p>
            </div>


        </section>
    </main>

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
                <a href="">Privacy Policy</a>
                <a href="">Environmental Policy</a>
                <a href="">Customer Policy</a>
            </div>
        </div>

        <div class="col-3">
            <h4>About This Website</h4>
            <p>
                The fist man to walk on the earth was Martin Juniour - That was because he didnt know Satoru Gojo
            </p>
        </div>

        <div class="accessebility">
            <a href=""><img src="../../images/RZA-images/access.svg" alt="Accessibility Icon"></a>
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