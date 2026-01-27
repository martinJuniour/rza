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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../safari-tickets/payment.css">
    <link rel="stylesheet" href="payment.css">
    <link rel="stylesheet" href="../../home/constants.css">
    <link rel="stylesheet" href="payment-media.css">
    <script src="../../home/utilis.js" defer></script>
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

        <section class="payment">

            <div class="head">
                <h1><span class="white">Hotel <span class="orange">booking payment</span><span class="white"> for Martin
                            Juniour</span></span></h1>
                <h3><span class="white">Please input payment detail below</span></h3>
            </div>

            <div class="inputs">
                <?php
                
                $roomType = $_SESSION['roomTypes'];

// Get final Price
$price = 0;
foreach($roomType as $r){
    $getPrice = "SELECT * FROM roomTypePrices WHERE roomType = '$r'";
    $getPriceQ = $db -> query($getPrice);
    if($getPriceQ){
        echo 'Room type available';
        while($rPrice = $getPriceQ -> fetch_assoc()){
            $roomPrice = $rPrice['unitPrice'];

            $price = (float) $price + (float) $roomPrice;
            unset($roomPrice);
        }
    }else{
        echo 'Couldnt find specifuc room tyep for final price';
    }
}        
                ?>
                <form action="makeBooking.php" method="post">
                    <div class="data-section">
                        <input type="text" name="fullName" id="fullName" placeholder="Enter Full Name on card">
                        <br><br>
                        <input type="text" name="sortCode" id="sortCode" placeholder="Enter Sort Code">
                        <br><br>
                        <input type="text" name="cardNumber" id="cardNumber" placeholder="Enter Card Number">
                        <br><br>
                        <input type="text" name="cvv" id="cvv" placeholder="Enter CVV Code">
                        <div class="a">
                            <a href="https://www.google.com/search?q=what+is+a+cvv&rlz=1C1GCEA_enGB1199GB1199&oq=what+is+a+cvv&gs_lcrp=EgZjaHJvbWUyCQgAEEUYORiABDIHCAEQABiABDIHCAIQABiABDIHCAMQABiABDIHCAQQABiABDIHCAUQABiABDIHCAYQABiABDIHCAcQABiABDIHCAgQABiABDIHCAkQABiABKgCALACAA&sourceid=chrome&ie=UTF-8&safe=active&ssui=on">What is a CVV</a>
                        </div>
                        <br><br>
                        <div class="check">
                            <input type="checkbox" name="correctDetails" id="correctDetails">
                            <label for="correctDetails"><span class="bold white">I confirm the above details are correct
                                    and my bank to be charged the agreed amount by RZA</span></label>
                        </div>
                    </div>

                    <div class="pay-btn">
                        <div class="submit-btn">
                            <input type="submit" name="noPoints" id="payed" value="Pay £<?php echo $price; ?>">
                        </div>

                        <a href="">
                            <span class="bold">You have

                                <?php
                                $customerID = $_SESSION['ID'];
                                $getBookingTotal = "SELECT SUM(loyalty) AS bk_total FROM hotelbookings  WHERE customerID = '$customerID' ";

                                // Get all customer IDS that Logged in user has had before
                                $getTempID = "SELECT *  FROM tempCustomerSafari WHERE customerID = '$customerID'";

                                $tempId = $db->query($getTempID);
                                $idS = [];
                                if ($tempId->num_rows > 0) {
                                    while ($id = $tempId->fetch_assoc()) {
                                        $nID = $id['customerTempID'];
                                        array_push($idS, $nID);
                                    }
                                } else {
                                    // echo 'Rows not more than 0';
                                }
                                // print_r($idS);
                                $listItems = "IN ('" . implode("' , '", $idS) . "' )";
                                // echo $listItems; 

                                $getTicketTotal = "SELECT SUM(loyalty) AS ticket_total FROM safariTicketBookings WHERE customerTempID $listItems";

                                $getBookingTotalQ = $db->query($getBookingTotal)->fetch_assoc();
                                $getTicketTotalQ = $db->query($getTicketTotal)->fetch_assoc();

                                if ($getBookingTotalQ && $getTicketTotalQ) {
                                    $total = $getBookingTotalQ['bk_total'] + $getTicketTotalQ['ticket_total'];
                                    echo $total;
                                } else {
                                    echo $db->error;
                                }; ?>
                                points (£<?php echo round(($total / 100 * 6.9), 2); ?>)
                            </span>
                        </a>

                        <div class="submit-btn">
                            <input type="submit" name="points" id="payed" value="Pay £<?php echo round($price - ($total / 100 * 6.9), 2); ?>">
                        </div>
                    </div>
                </form>
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