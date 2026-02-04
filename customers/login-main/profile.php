<?php

use LDAP\Result;
// TEsting Succesful Data BAse connection
include("../../home/db.php");
session_start();
// if($db){
//     echo 'successull connection';
// }else{
//     echo 'Error connection to Database';
// }
?>

<?php

// Customer IDentification
$customerID = $_SESSION['ID'];

// Get all customer Data
$getData = "SELECT * FROM customers WHERE customerID = '$customerID'";
$checkData = $db->query($getData);

if ($checkData && $checkData->num_rows > 0) {
    // Customer doees exist
    while ($cust = $checkData->fetch_assoc()) {
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
            <link rel="stylesheet" href="../../home/constants.css">
            <link rel="stylesheet" href="temp-media.css">
            <link rel="stylesheet" href="profile.css">
            <!-- <link rel="stylesheet" href="../registration-main/temp.css"> -->
            <script src="../../home/utilis.js" defer></script>
            <script src="utilis.js" defer></script>
            <script src="/htdocs/home/mainAccess.js" defer></script>
        </head>

        <body>
            <!-- Navigation Section : MAin HEader -->
            <header>

                <!-- Top banner with search bar -->
                <section class="banner">
                    <div class="logo">
                        <img src="../../images/RZA-images/logo.svg" alt="RZA Logo">
                    </div>
                    <div class="items">
                        <div class="search">
                            <img src="../../images/RZA-images/searchIcon.svg" alt="Search Icon">
                            <input type="text" id="search" placeholder="Enter a Search Item...">
                        </div>

                        <div class="nav-btn">
                            <img src="../../images/menu.png" id="nav-btn">
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
                        <a href="../../bookings/safari-tickets/index.php">Book a Safari Ticket</a>
                        <a href="../../bookings/hotel-tickets/index.php">Book a Night in Hotel</a>
                        <a href="../../home/termsAndCs.php">Terms and Conditions</a>
                        <?php
                        // Dont Display Login Button if already logged in
                        if ($_SESSION['login']) {
                            echo '<a href="logout.php" class="log-out" style="background-color: white;text-align: center;">Log Out</a>';
                        } else {
                            echo '<a href="index.html">Login</a>';
                            echo '<a href="../registration-main/index.html">Create Account</a>';
                        }


                        ?>

                        <a href="../accessibility/index.php">Accessebility Settings</a>
                        <a href="../../home/policyLinks.php">All Legal : RZA</a>
                        <a href="../../home/contact.php">Report an Issue</a>
                    </div>
                </nav>

            </header>

            <hr>
            <!-- Main section for all content -->
            <main>
                <br>
                <h1 class="greeting"><span class="green bold">Good Afternoon</span>, <?php echo $cust['firstName']; ?></h1>
                <br>

                <section class="mainProfile">
                    <aside>
                        <hr>
                        <button class="btn btn-dark" onclick="loadContent('editProfile')">Edit Your Profile</button>
                        <button class="btn btn-dark" onclick="loadContent('message')">Messages</button>
                        <button class="btn btn-dark" onclick="loadContent('bookings')">Hotel Bookings</button>
                        <button class="btn btn-dark" onclick="loadContent('tickets')">Tickets</button>
                        <hr>
                        <p class="btn btn-light points"> <span class="bold orange">Total Points: <?php

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
                        // Return list of all temp IDs owned by Customer ID
                        $listItems = "IN ('" . implode("' , '", $idS) . "' )";
                        // echo $listItems; 
                
                        $getTicketTotal = "SELECT SUM(loyalty) AS ticket_total FROM safariTicketBookings WHERE customerTempID $listItems";

                        $getUSed = "SELECT SUM(used) AS used FROM loyalty WHERE customerID = '$customerID'";


                        $getBookingTotalQ = $db->query($getBookingTotal)->fetch_assoc();
                        $getTicketTotalQ = $db->query($getTicketTotal)->fetch_assoc();

                        $getUSedQ = $db->query($getUSed);
                        if ($getUSedQ) {
                            if ($getBookingTotalQ && $getTicketTotalQ) {
                                $total = $getBookingTotalQ['bk_total'] + $getTicketTotalQ['ticket_total'];
                                $used = $getUSedQ->fetch_assoc()['used'];

                                $finTotal = $total - $used;

                                echo $finTotal;
                            } else {
                            }
                        } else {
                            if ($getBookingTotalQ && $getTicketTotalQ) {
                                $total = $getBookingTotalQ['bk_total'] + $getTicketTotalQ['ticket_total'];
                                echo $total;
                            }
                        }


                        ; ?>
                            </span>
                        </p>
                        <hr>
                    </aside>
                    <section class="content">
                        <h3 class="hello">
                            Hi there From RZA 👋🏼
                        </h3>

                        <section class="all">

                            <section id="edit" data-category="editProfile">
                                <form action="edit.php" method="post">
                                    <section class="form">
                                        <span class="bold white">
                                            <h1><mark>Edit your account details below</mark></h1>
                                        </span>
                                        <br>
                                        <label for="firstName">First Name</label><br><br>
                                        <input type="text" name="firstName" id="firstName" maxlength="40" minlength="3"
                                            value="<?php echo $cust['firstName']; ?>" required>
                                        <br><br>

                                        <label for="lastNAme">Last Name</label><br><br>
                                        <input type="text" name="lastName" id="lastName"
                                            value="<?php echo $cust['lastNAme']; ?>" maxlength="40" minlength="3" required>
                                        <br><br>

                                        <label for="username">Email Address</label><br><br>
                                        <input type="email" name="userName" id="userName" maxlength="40" minlength="3" readonly
                                            autocomplete="off" aria-disabled="false" value="<?php echo $cust['username']; ?>">

                                        <br><br>
                                        <p>Password</p>
                                        <button onclick="changePass()" class="btn btn-dark pass">Change Password</button>

                                        <br><br>

                                        <label for="postalCode">Post Code</label><br><br>
                                        <input type="text" name="postalCode" id="postalCode"
                                            value="<?php echo $cust['postalCode']; ?>">
                                        <br><br>

                                        <div class="check">

                                            <label for="marketingCon">Recieve Marketing Emails</label><br>

                                            <select name="marketingCon" id="marketingCon">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>

                                            <input type="hidden" name="marketing" id="hiddenInput"
                                                value="<?php echo $cust['marketing']; ?>">

                                            <!--  -->
                                        </div>
                                        <br><br>
                                        <input type="submit" class="btn btn-success" value="Save">
                                        <a class="btn btn-danger">Delete Account</a>
                                        <a class="btn btn-warning">Cancel </a>

                                    </section>

                                </form>
                            </section>

                            <section id="messages" data-category="message">
                                <h4 style="text-align: center;">Messages Coming Soon</h4>
                            </section>

                            <section id="hotel-bookings" data-category="bookings">
                                <h2>Showing All Hotel Bookings</h2>
                                <table>
                                    <tr class="headers">
                                        <th>Reference number</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Number of People</th>
                                        <th>Booking Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php

                                    $getBookings = "SELECT * FROM hotelBookings where customerID = '$customerID' ORDER BY createdAt DESC";
                                    $getBookingsQ = $db->query($getBookings);

                                    if ($getBookingsQ && $getBookingsQ->num_rows > 0) {
                                        while ($bk = $getBookingsQ->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo "#"; ?></td>
                                                <td><?php echo $bk['startDate']; ?></td>
                                                <td><?php echo $bk['endDate']; ?></td>
                                                <td><?php echo $bk['visitorQTY']; ?></td>
                                                <td>
                                                    <div class="btn btn-light" style="color: green; cursor: default;width:100%;">
                                                        <?php echo $bk['pricePayed'] > 0 ? "Payed" : "Not-Payed"; ?>
                                                    </div>
                                                </td>
                                                <td><a href="../../bookings/hotel-tickets/delBooking.php" class="btn btn-danger">Delete
                                                        booking</a></td>
                                            </tr>

                                            <?php
                                        }
                                    }

                                    ?>

                                </table>
                            </section>

                            <section id="tickets" data-category="tickets">
                                <h2>Showing All Safari Bookings</h2>
                                <table>
                                    <tr class="headers">
                                        <th>Reference number</th>
                                        <th>Number Of Tickets</th>
                                        <th>Date Visiting</th>
                                        <th>Actions</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        $getBookings = "SELECT * FROM tempCustomerSafari where customerID = '$customerID'";
                                        $getBookingsQ = $db->query($getBookings);
                                        if ($getBookingsQ && $getBookingsQ->num_rows > 0) {
                                            while ($bk = $getBookingsQ->fetch_assoc()) {
                                                $tempId = $bk['customerTempID'];

                                                $getBk = "SELECT * FROM safariTicketBookings WHERE customerTempID = '$tempId'";
                                                $getBkQ = $db->query($getBk);
                                                ?>
                                                <td><?php echo "#" . $bk['customerTempID']; ?></td>
                                                <?php
                                                if ($getBkQ && $getBkQ->num_rows > 0) {
                                                    while ($BkDetails = $getBkQ->fetch_assoc()) {
                                                        ?>
                                                        <td><?php echo $BkDetails['ticketQty']; ?></td>
                                                        <td><?php echo $BkDetails['dateOfVisitation']; ?></td>
                                                        <td><a href="../../bookings/hotel-tickets/delBooking.php" class="btn btn-danger">Delete
                                                                booking</a></td>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tr>

                                            <?php
                                            }
                                        }

                                        ?>

                                </table>
                            </section>

                        </section>

                    </section>
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
                    <a href="../accessibility/index.php"><img src="../../images/RZA-images/access.svg"
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
        <?php
    }
} else {
    echo $db->error;
    echo "You might want to Login Before viewing this page";
}

?>