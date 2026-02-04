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
    if (isset($_POST['makeHotelBooking'])) {

        // Send to makeBooking age only after room Availability is confirmed
        $_SESSION['fname'] = $_POST['firstName'];
        $_SESSION['lname'] = $_POST['lastName'];

        echo $_POST['firstName'];
        echo $_POST['lastName'];


        $_SESSION['email'] = $_POST['email'];
        $_SESSION['numOfVisitors'] = $_POST['numOfVisitors'];
        $_SESSION['startDate'] = $_POST['startDate'];
        $_SESSION['finDate'] = $_POST['finDate'];

        $startDay = $_POST['startDate'];
        $finDay = $_POST['finDate'];

        $rooms = [];
        if (isset($_POST['roomType1'])) {
            $roomType1 = $_POST['roomType1'];
            $rooms[] = $roomType1;
        }
        if (isset($_POST['roomType2'])) {
            $roomType2 = $_POST['roomType2'];
            $rooms[] = $roomType2;
        }
        if (isset($_POST['roomType3'])) {
            $roomType3 = $_POST['roomType3'];
            $rooms[] = $roomType3;
        }

        // Date Range Check Function
        function rangeCheck($oneStart, $oneEnd, $twoStart, $twoEnd)
        {

            // Convert all variables to Valid dates
            $oneStart = strtotime($oneStart);
            $oneEnd = strtotime($oneEnd);
            $twoStart = strtotime($twoStart);
            $twoEnd = strtotime($twoEnd);


            // Check What is outputted
            echo "One Start: " . $oneStart . "<br> One End: " . $oneEnd . "<br><hr>";
            echo "Two Start Start: " . $twoStart . "<br> Two End: " . $twoEnd . "<br>";


            // Check agaisnt dates to detrimine ranges
            if ($twoStart > $oneEnd) {
                // Okay - Rnages dont tpuuch
                return true;
            } else if ($twoStart < $oneEnd) {
                // Not okay - Compare with satrt date
                if ($twoEnd < $oneStart) {
                    // Okay -- Valid ranges dont touch
                    return true;
                } else {
                    return false;
                }
            } else {
                // They are eqaul --- no match
                return false;
            }
        }

        // Check Room availability ----------------------------------------


        // 1. Retrive desired rooms

        $roomsNeeded = [];
        $roomCountNeeded = count($roomsNeeded);
        $roomsCount = count($rooms);

        echo "<br><br> Rooms we need " . $roomsCount . "<br><br>";

        // Must run until we hav enough desired rooms
        while ($err !== 1) {
            foreach ($rooms as $room) {

                $getRoom = "SELECT * FROM rooms where roomType = '$room' and roomAvailability = 'free' ORDER BY bookings";
                $getRoomQ = $db->query($getRoom);

                if ($getRoomQ && $getRoomQ->num_rows > 0) {
                    echo '<br><br>Exploring ' . $room . ' Room types<br><br>';

                    while ($roomE = $getRoomQ->fetch_assoc()) {
                        // Save Room ID for later array saving-
                        $roomID = $roomE['roomID'];
                        $bookings = $roomE['bookings'];

                        echo "<br>Bookings BEfore : ......................." . $bookings;

                        // Find if that room already has a booking tied to it
                        $findRoomBooking = "SELECT * FROM hotelbookedrooms where roomID = '$roomID'";
                        $findRoomBookingQ = $db->query($findRoomBooking);

                        // if room is already booked
                        if ($findRoomBookingQ && $findRoomBookingQ->num_rows > 0) {

                            echo "<div style='border: 3px solid black;'> Room Has a booking already!!!!!!!!!!!!!!!! </div>";
                            $roomCheck = [];
                            while ($roomDates = $findRoomBookingQ->fetch_assoc()) {
                                $exStartDate = $roomDates['bookingStartRange'];
                                $exEndDate = $roomDates['bookingEndRange'];

                                // Check if existing bookings wont overlap with new desireed bookings
                                rangeCheck($startDay, $finDay, $exStartDate, $exEndDate) ? $roomCheck[] = 'yes' : $roomCheck[] = 'no-can-do';

                            }

                            print_r($roomCheck);

                            // Check if anything inside overlaps -- if no can do is in the array
                            if (in_array('no-can-do', $roomCheck)) {

                                // You cant make a booking with this room with the provided range
                                // Cancel Booking in all
                                // Restart the loop dont do anything


                                echo "ROOM IS ALREADY AN INDEX -------> UNFORTUNATELY THERE ARE NO FREE ROOMS";
                                $err = 1;

                                echo "<br><br> This room Is already Booked and is at full capacity <br><br>";
                                $err = 1;
                            } else {
                                // If slot available : add to list

                                if (in_array($roomID, $roomsNeeded)) {
                                    // Dont Save
                                    $err = 1;
                                } else {
                                    $roomsNeeded[] = $roomID;
                                    echo '<hr><hr> Success Room Addded!!!! <hr><hr>';
                                    $bookings++;

                                    // Update number of bookings inside specific room
                                    $bookings === 3 ? $updateBookings = "UPDATE rooms SET bookings = '$bookings' , roomAvailability = 'booked' WHERE roomID = '$roomID' " : $updateBookings = "UPDATE rooms SET bookings = '$bookings' WHERE roomID = '$roomID' ";

                                    $updateBookingsQ = $db->query($updateBookings);
                                    if ($updateBookingsQ) {
                                        echo '<br>ROOM BOOKING HAS BEEN UPDATED<br>';
                                        echo "<br>Bookings After : <br>" . $bookings . "<br><br>";
                                        echo $updateBookings;
                                        unset($bookings);
                                        break;
                                    } else {
                                        echo '<br>FAILED TO UPDATE ROOM BOOKING VALUE <br>';
                                        echo $db->error;
                                    }
                                }
                            }

                        } else {
                            // Save room in a list to be sent to store all booked rooms
                            // Dont save if already exisst in list
                            if (in_array($roomID, $roomsNeeded)) {
                                // $roomIndex = array_search($roomID, $roomsNeeded);

                                // Exit bthe loop immediately
                                echo "ROOM IS ALREADY AN INDEX -------> UNFORTUNATELY THERE ARE NO FREE ROOMS";
                                $err = 1;
                            } else {
                                $roomsNeeded[] = $roomID;
                                echo '<hr><hr> Success Room Addded!!!! <hr><hr>';
                                $bookings++;

                                // Update number of bookings inside specific room
                                $bookings === 3 ? $updateBookings = "UPDATE rooms SET bookings = '$bookings' , roomAvailability = 'booked' WHERE roomID = '$roomID' " : $updateBookings = "UPDATE rooms SET bookings = '$bookings' WHERE roomID = '$roomID' ";

                                $updateBookingsQ = $db->query($updateBookings);
                                if ($updateBookingsQ) {
                                    echo '<br>ROOM BOOKING HAS BEEN UPDATED<br>';
                                    echo "<br>Bookings After : <br>" . $bookings;
                                    echo $updateBookings;
                                    unset($bookings);
                                    break;
                                } else {
                                    echo '<br>FAILED TO UPDATE ROOM BOOKING VALUE <br>';
                                    echo $db->error;
                                }
                            }

                        }
                    }

                    // Breaking Statement
                    if (count($roomsNeeded) === count($rooms)) {
                        $err = 1;
                    }

                } else {
                    echo "<br><br><hr><hr> NO FREE ROOMS AVAILABLE <br><br><hr><hr>";
                    $err = 1;
                }
            }

        }
        // See what is inside roomsNeeded
        print_r($roomsNeeded);

        echo "<br><br> Rooms we have " . count($roomsNeeded) . "<br><br>";

        // If list doesnt match with whats needed rtreive bookings and delete them

        if (count($roomsNeeded) !== count($rooms)) {
            echo "Can't make a booking: Not Enough requiremenst to meet booking targets";


            // Delete raedy made bookings
            foreach ($roomsNeeded as $r) {
                // Reduce booking by 1
                // If booking is not 3 anymore change state from booked to free

                // 1. Get current bookings count
                $getBookings = "SELECT * FROM rooms WHERE roomID = $r";
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

            // Give option to cancel Boookings
            $_SESSION['cancel'] = true;

            header("Location: delBooking.php");


        } else {
            $roomType = [];

            foreach ($roomsNeeded as $r) {
                // 1. Get type of room bookings
                $getBookings = "SELECT * FROM rooms WHERE roomID = $r";
                $getBookingsQ = $db->query($getBookings);
                if ($getBookingsQ && $getBookingsQ->num_rows > 0) {
                    while ($bk = $getBookingsQ->fetch_assoc()) {
                        $roomType[] = $bk['roomType'];
                    }
                }
            }

            // Save the available rooms in a session to send to make booking
            $_SESSION['rooms'] = $roomsNeeded;
            $_SESSION['roomTypes'] = $roomType;
            // header("Location: payment.php");
        }
    }
}

// ------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------------------

?>