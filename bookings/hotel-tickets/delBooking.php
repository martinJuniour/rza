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

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // Cancel Booking
    if(isset($_POST['cancelBooking'])){
        $bookingID = $_SESSION['bookingID'];

        // GEt Booking and delete it
        $delBooking = "DELETE FROM hotelBookings where bookingID = '$bookingID' ";

        $run = $db -> query($delBooking);
        if($run){
            echo 'Booking Deleted Succe ssfully';

            // Reset temporary session checks nad values
            $_SESSION['bookingID'] = [];
            $_SESSION['cancel'] = [];

        }else{
            echo 'Booking Deletion Failed';
            echo $db -> error;
        }
    }}

?>