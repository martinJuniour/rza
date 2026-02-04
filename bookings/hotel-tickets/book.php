<?php
session_start();
include("../../home/db.php");
// Log 'Login' Error
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    header("Location: error.html");
}
if (!isset($_SESSION['cancel'])) {
    $_SESSION['cancel'] = false;
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
    <link rel="stylesheet" href="book.css">
    <link rel="stylesheet" href="../../home/constants.css">
    <link rel="stylesheet" href="book-media.css">
    <script src="../../home/utilis.js" defer></script>
    <script src="utilis.js" defer></script>
</head>

<body>


    <!-- Main section for all content -->
    <main>
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

        <div class="all">
            <div class="inputs">
                <div class="book-heading">
                    <h2 style="font-size: 50px;"><span class="orange">Book</span> for up to a week in
                        our Hotel</h2>
                </div>

                <br><br>
                <form action="delBooking.php" method="POST"
                    style="display: <?php echo $_SESSION['cancel'] ? 'block' : 'none'; ?>;">
                    <input type="submit" class="btn btn-danger" name="cancelBooking" value="Cancel Booking">
                </form>
                <br>
                <form action="room.php" method="post">
                    <input type="text" name="firstName" id="firstName" placeholder="Enter First Name">
                    <br><br>
                    <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name">
                    <br><br>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" readonly>
                    <br><br>
                    <div class="rangeOfStay">
                        <label for="startDate">When would you stay start</label>
                        <input type="date" name="startDate" id="startDate">
                        <br><br>
                        <label for="finDate">When would you stay end</label>
                        <input type="date" name="finDate" id="finDate">
                        <br><br>
                    </div>
                    <div class="qty-visitors">
                        <label for="numOfVisitors">Enter Number of Visitors</label>
                        <input type="number" name="numOfVisitors" id="numOfVisitors" min="1" max="12">
                        <br><br>
                    </div>
                    <br>
                    <div class="qty-rooms">
                        <label for="numOfRooms">Enter Number of rooms You'd like to book</label>
                        <input type="number" name="numOfRooms" id="numOfRooms" max="3" min="1">
                        <br><br>
                    </div>
                    <div class="BTN-con">
                        <br><br>
                        <button onclick="getRoomTypes()" class="btn btn-warning" style="height: 80px;">Check and
                            Confirm</button>
                    </div>
                    <div class="room-input">
                        <br><br>
                        <style>
                            .rooms {
                                display: flex;
                                flex-direction: column;
                                flex-wrap: wrap;
                                gap: 1rem;
                                justify-content: center;
                                width: 50%;
                                border: 3px solid orange;
                                width: 100%;
                                padding: 1%;
                            }

                            .rooms select {
                                height: 50px;
                            }
                        </style>
                        <section class="rooms" style="display: flex;"></section>
                    </div>
                    <br><br>
                    <p class="disclaimer">
                        By booking with us, you confirm your details are correct.
                        Bookings are only confirmed once you receive our confirmation.
                        Prices, fees, and taxes may change before confirmation.
                        Payment must be completed or the booking may be cancelled.
                        Cancellations and changes follow the policy shown at checkout.
                        Guests must follow occupancy limits, check-in/out times, and house rules.
                        Damage or serious rule breaches may result in extra charges or removal.
                        Contact us before booking if you have special requests or questions.
                    </p>

                    <br><br>
                    <div class="check">
                        <input type="checkbox" name="aggree" id="aggree" required>
                        <label for="aggree"><span class="bold" style="font-size: 20px;font-weight: 400;">I aggree that
                                the details above are corrcect and I have
                                read and understood the above disclaimer</span></label>
                        <br><br>
                    </div>
                    <br>

                    <input type="submit" name="makeHotelBooking" value="Proceed to Payment" class="btn btn-success">
                </form>

                <script>
                    const check = "<?php echo $_SESSION['cancel']; ?>";
                    check === "1" ? alert('Error Making Booking - It looks like we might not have a free room on that date. Try Choose another Date or Cancel booking in all') : console.log(check);
                </script>


            </div>
            <h1 class="below"><span class="white">See what to </span><span class="orange">Expect</span><span
                    class="white"> down below</span></h1>
            <div class="images">
                <img src="../../images/RZA-images/pool.jpg" alt="Steaming room with wooden sits">
                <img class="left-align" src="../../images/RZA-images/hotel2.jpg" alt="Outdoor hotel with trees around">
                <img src="../../images/RZA-images/pillow.jpg" alt="Pillow on a chouch with an owl drawing">
            </div>
        </div>

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
            <a href="../../customers/accessibility/index.php"><img src="../../images/RZA-images/access.svg"
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