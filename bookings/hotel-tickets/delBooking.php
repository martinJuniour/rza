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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Cancel Booking
    if (isset($_POST['cancelBooking'])) {
        $bookingID = $_SESSION['bookingID'];

        // GEt Booking and delete it
        $delBooking = "DELETE FROM hotelBookings where bookingID = '$bookingID' ";

        $run = $db->query($delBooking);
        if ($run) {
            echo 'Booking Deleted Successfully';

            // Update Room Bookings
            $rooms = $_SESSION['rooms'];
            foreach ($rooms as $r) {
                // Reduce booking by 1
                // If booking is not 3 anymore change state from booked to free

                // 1. Get current bookings count
                $getBookings = "SELECT * FROM hotelBookedRooms WHERE roomID = $r and bookingID = '$bookingID'";
                $getBookingsQ = $db->query($getBookings);
                if ($getBookingsQ && $getBookingsQ->num_rows > 0) {
                    while ($bk = $getBookingsQ->fetch_assoc()) {
                        $roomBK = $bk['bookings'];
                    }

                    // 2. Update the bookings by reducing it by one nad check if it was 3 before change
                    $roomBK--;
                    $roomUpdate = "UPDATE rooms set bookings = '$roomBK', roomAvailability = 'free' WHERE roomID = '$r'";
                    $roomUpdateQ = $db->query($roomUpdate);


                    // 3. Check if code ran successfully
                    if ($roomUpdateQ) {
                        echo "Room Updates successfully";
                    } else {
                        echo "Error in updating room";
                    }

                }
                unset($roomBK);
            }

            // Reset temporary session checks nad values
            $_SESSION['bookingID'] = [];
            $_SESSION['cancel'] = [];
            $_SESSION['rooms'] = [];

            header("Location: book.php");

        } else {
            echo 'Booking Deletion Failed';
            echo $db->error;
        }
    }
}

?>