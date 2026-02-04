<?php
// TEsting Succesful Data BAse connection
include("../../home/db.php");
session_start();
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}
// if($db){
//     echo 'successull connection';
// }else{
//     echo 'Error connection to Database';
// }
?>
<?php

// GO to payment.php
if (isset($_POST['proceedToPayment'])) {
    $ticketQty = $_POST['numOfTickets'];
    $pay = round($ticketQty * 26.99, 2);


    $_SESSION['toPaySafari'] = $pay;

    // Fisrt Iinsert into Temp Customers table
    $_SESSION['s-fname'] = $_POST['firstName'];
    $_SESSION['s-lname'] = $_POST['lastName'];
    $_SESSION['s-contact'] = $_POST['contact'];
    $_SESSION['s-date'] = $_POST['dateOfVisit'];
    $_SESSION['qty'] = $ticketQty;

    header("Location: payment.php");
}

// COme back from payment.php
if (isset($_POST['payed'])) {

    // GEt random check value
    $rand = bin2hex(random_bytes(43));
    $_SESSION['rand'] = $rand;

    $firstName = $_SESSION['s-fname'];
    $lastName = $_SESSION['s-lname'];
    $contact = $_SESSION['s-contact'];
    $dateOfVisitation = $_SESSION['s-date'];
    $pricePayed = $_SESSION['toPaySafari'];
    $points = round(($pricePayed / 35) ** 2, 2);
    $ticketQty = $_SESSION['qty'];



    if ($_SESSION['login'] = true) {
        $customerID = $_SESSION['ID'];
        $used = $_SESSION['safari-used'];
    }


    if (!isset($_SESSION['ID'])) {
        $insert = "INSERT INTO tempCustomerSafari (firstName, lastName, contact, tempCheck) VALUES (
                '$firstName',
                '$lastName',
                '$contact',
                '$rand'
            )";
    } else {
        $insert = "INSERT INTO tempCustomerSafari (customerID, firstName, lastName, contact, tempCheck) VALUES (
                '$customerID',
                '$firstName',
                '$lastName',
                '$contact',
                '$rand'
            )";
    }

    $run = $db->query($insert);
    if ($run) {
        echo "<br><br> Successfull Booking made to tempCustomerBooking<br><br>";
    } else {
        echo $db->error;
        echo '<br><br> Error in TEmp Customer Booking <br><br>';
    }

    // Second Iinsert ino Safari Bookings table

    // Retrive tempCustomerID 
    $getID = "SELECT * FROM tempCustomerSafari WHERE tempCheck = '$rand'";
    $checkID = $db->query($getID);
    if ($checkID) {
        echo ' <br><br> Successfull ID Retrival <br><br>';
        if ($checkID->num_rows > 0) {
            echo "<br><br>Get ID number of rows is more than 0";
            while ($userID = $checkID->fetch_assoc()) {
                $customerTempID = $userID['customerTempID'];
            }
        } else {
            echo "<br><br>Get ID number of rows is not more than 0";
        }
    } else {
        echo "<br><br> Error in ID retrival <br><br>";
    }

    $insertBooking = "INSERT INTO safariTicketBookings (customerTempID, ticketQty, pricePayed, dateOfVisitation, loyalty) VALUES (
            '$customerTempID',
            '$ticketQty',
            '$pricePayed',
            '$dateOfVisitation',
            '$points'
        )";

    $bookingStatus = $db->query($insertBooking);
    if ($bookingStatus) {
        echo "<br><br> Booking made Succesfuuly <br><br>";
    } else {
        echo "<br><br> Booking NOT made Succesfuuly <br><br>";
        echo $db->error;
    }




    $_SESSION['toPaySafari'] = [];

    // Fisrt Iinsert into Temp Customers table
    $_SESSION['s-fname'] = [];
    $_SESSION['s-lname'] = [];
    $_SESSION['s-contact'] = [];
    $_SESSION['s-date'] = [];
    $_SESSION['qty'] = [];

    header("Location: congrats.php");
}

if (isset($_POST['points'])) {

    // GEt random check value
    $rand = bin2hex(random_bytes(43));
    $_SESSION['rand'] = $rand;

    $firstName = $_SESSION['s-fname'];
    $lastName = $_SESSION['s-lname'];
    $contact = $_SESSION['s-contact'];
    $dateOfVisitation = $_SESSION['s-date'];
    $fintotal = $_SESSION['total'];
    
    $pricePayed = round($_SESSION['toPaySafari'] - ($fintotal / 100 * 6.90), 2);

    // If you use your point s- You dont get any new ones when you book -- Subject to Chnage Later
    $points = 0;

    // If free booking - only use 200 points
    if (isset($_SESSION['free-Safari']) && $_SESSION['free-Safari'] === 'free') {
        $used = 200;
    } else {
        // USe all teh point thats not 200
        $used = $fintotal;
    }


    $ticketQty = $_SESSION['qty'];



    if ($_SESSION['login'] = true) {
        $customerID = $_SESSION['ID'];
    }


    if (!isset($_SESSION['ID'])) {
        $insert = "INSERT INTO tempCustomerSafari (firstName, lastName, contact, tempCheck) VALUES (
                '$firstName',
                '$lastName',
                '$contact',
                '$rand'
            )";
    } else {
        $insert = "INSERT INTO tempCustomerSafari (customerID, firstName, lastName, contact, tempCheck) VALUES (
                '$customerID',
                '$firstName',
                '$lastName',
                '$contact',
                '$rand'
            )";
    }

    if ($used > 0) {
        $used = "INSERT INTO loyalty (customerID, used) VALUES ('$customerID', '$used')";
        $usedQ = $db->query($used);

        if ($usedQ) {
            echo 'USed Field Updated';
        } else {
            echo 'Used nO Updated';
        }
    }


    $run = $db->query($insert);
    if ($run) {
        echo "<br><br> Successfull Booking made to tempCustomerBooking<br><br>";
    } else {
        echo $db->error;
        echo '<br><br> Error in TEmp Customer Booking <br><br>';
    }

    // Second Iinsert ino Safari Bookings table

    // Retrive tempCustomerID 
    $getID = "SELECT * FROM tempCustomerSafari WHERE tempCheck = '$rand'";
    $checkID = $db->query($getID);
    if ($checkID) {
        echo ' <br><br> Successfull ID Retrival <br><br>';
        if ($checkID->num_rows > 0) {
            echo "<br><br>Get ID number of rows is more than 0";
            while ($userID = $checkID->fetch_assoc()) {
                $customerTempID = $userID['customerTempID'];
            }
        } else {
            echo "<br><br>Get ID number of rows is not more than 0";
        }
    } else {
        echo "<br><br> Error in ID retrival <br><br>";
    }

    $insertBooking = "INSERT INTO safariTicketBookings (customerTempID, ticketQty, pricePayed, dateOfVisitation, loyalty) VALUES (
            '$customerTempID',
            '$ticketQty',
            '$pricePayed',
            '$dateOfVisitation',
            '$points'
        )";

    $bookingStatus = $db->query($insertBooking);
    if ($bookingStatus) {
        echo "<br><br> Booking made Succesfuuly <br><br>";
    } else {
        echo "<br><br> Booking NOT made Succesfuuly <br><br>";
        echo $db->error;
    }




    $_SESSION['toPaySafari'] = [];

    // Fisrt Iinsert into Temp Customers table
    $_SESSION['s-fname'] = [];
    $_SESSION['s-lname'] = [];
    $_SESSION['s-contact'] = [];
    $_SESSION['s-date'] = [];
    $_SESSION['qty'] = [];
    $_SESSION['finTotal'] = [];

    header("Location: congrats.php");
}

?>