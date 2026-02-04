<?php
session_start();
include("../../home/db.php");
// Log 'Login' Error
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}
// if($db){
//     echo 'Atty';

// }else{
//     echo 'Not yet';
// }
?>
<?php

// Booking Information to write to Data Base
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];

echo $lname;
echo $fname;

$email = $_SESSION['email'];
$visitorQTY = $_SESSION['numOfVisitors'];
$startDay = $_SESSION['startDate'];
$finDay = $_SESSION['finDate'];
$roomType = $_SESSION['roomType'];
if (isset($_POST['noPoints'])) {
    $price = (float) explode(' ', string: $_POST['noPoints'])[2];
    $loyalty = (int) round(($price / 35) ** 2, 0);
    $used = 0;
} else if (isset($_POST['points'])) {
    $price = (float) explode(' ', $_POST['points'])[2];
    $loyalty = (float) 0;
    $used = $_SESSION['total'];
}

echo $price . '<hr>' . $loyalty;

// Array of available rooms
$rooms = $_SESSION['rooms'];

$customerID = $_SESSION['ID'];

// TEmporary Check to retriev booking ID ---- DELETE RAND AFTER It is used (On Deletion)
$rand = bin2hex(random_bytes(18));
$_SESSION['ref'] = $rand;


// Insert into used
if ($used > 0) {
    $used = "INSERT INTO loyalty (customerID, used) VALUES ('$customerID', '$used')";
    $usedQ = $db->query($used);

    if ($usedQ) {
        echo 'USed Field Updated';
    } else {
        echo 'Used nO Updated';
    }
}

// Do not insert into hotel Bookings before cgcking Availability
$insertBooking = "INSERT INTO hotelBookings (customerID, bFirstName, bLastName, email, startDate, endDate, pricePayed, visitorQTY, tempCheck, loyalty) VALUES ('$customerID','$fname','$lname','$email','$startDay','$finDay','$price','$visitorQTY','$rand', '$loyalty')";

$bookingParam = $db->query($insertBooking);
if ($bookingParam) {
    echo '<br><br>Booking Step 1 Inserted Successfully<br><br>';
} else {
    echo '<br><br>Booking not made it to BAse successfully<br><br>';
    echo $db->error;
}

$getBookingID = "SELECT bookingID FROM hotelBookings WHERE tempCheck = '$rand'";
$getBookingIDCheck = $db->query($getBookingID);
if ($getBookingIDCheck && $getBookingIDCheck->num_rows > 0) {
    echo 'Booking ID Succesfully retrived';
    // Store Booking ID in retrivable variable
    while ($hotelEntity = $getBookingIDCheck->fetch_assoc()) {
        $bookingID = $hotelEntity['bookingID'];
        $_SESSION['bookingID'] = $bookingID;
    }
    // For each value in returned list of valid bookings
    // Inserting into HotelRoomBookings
    foreach ($rooms as $room) {
        $intoHotelRoomBookings = "INSERT INTO hotelBookedRooms (roomID, bookingID, bookingStartRange, bookingEndRange) VALUES ('$room','$bookingID','$startDay','$finDay')";

        // Booking only to be made if applied range does not overlap
        $intoTableHRB = $db->query($intoHotelRoomBookings);
        if ($intoTableHRB) {
            echo '<br> NEw Room Booking Successfullly Made <br>';
        } else {
            echo '<br> Room Booking Was not made <br> Error in your COde Martin <br>';
            echo $db->error;
        }
    }

    header("Location: congrats.php");


    // Delete data in session --- NO DELETE (TESTING PURPOSES)
    // $_SESSION['fname'] = [];
    // $_SESSION['lname'] = [];
    // // Dont Delete email
    // $_SESSION['numOfVisitors'] = [];
    // // $_SESSION['startDate'] = [];
    // $_SESSION['finDate'] = [];
    // $_SESSION['roomTypes'] = [];
}



?>