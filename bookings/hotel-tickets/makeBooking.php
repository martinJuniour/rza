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
    if(isset($_POST['makeBooking'])){
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $email = $_POST['email'];
        $startDay = $_POST['startDate'];
        $finDay = $_POST['finDate'];
        $visitorQTY = $_POST['numOfVisitors'];
        $customerID = $_SESSION['ID'];

        // TEmporary Check to retriev booking ID
        $rand = bin2hex(random_bytes(34));


        // echo $rand;

        $rooms = array();
        if(isset($_POST['roomType1'])){
            $roomType1 = $_POST['roomType1'];
            $rooms[] = $roomType1;
        }
        if(isset($_POST['roomType2'])){
            $roomType2 = $_POST['roomType2'];
            $rooms[] = $roomType2;
        }
        if(isset($_POST['roomType3'])){
            $roomType3 = $_POST['roomType3'];
            $rooms[] = $roomType3;
        }

        // TEst to see content of array
        // print_r($rooms);

        $insertBooking = "INSERT INTO hotelBookings (customerID, bFirstName, bLastName, email, startDate, endDate, pricePayed, visitorQTY, tempCheck) VALUES (
            '$customerID',
            '$fName',
            '$lName',
            '$email',
            '$startDay',
            '$finDay',
            '0',
            '$visitorQTY',
            '$rand'
        )";

        $bookingParam = $db -> query($insertBooking);
        if($bookingParam){
            echo '<br><br>Booking Step 1 Inserted Successfully<br><br>';
        }else{
            echo '<br><br>Booking not made it to BAse successfully<br><br>';
            echo $db -> error;
        }

        $getBookingID = "SELECT bookingID FROM hotelBookings WHERE tempCheck = '$rand'";
        $getBookingIDCheck = $db -> query($getBookingID);
        if($getBookingIDCheck){
            echo 'Booking ID Succesfu;;y retrived';


            // Store Booking ID in retrivable variable
            while($hotelEntity = $getBookingIDCheck -> fetch_assoc()){
                $bookingID = $hotelEntity['bookingID'];
            }

            foreach($rooms as $room){

                $getFreeRoom = "SELECT * FROM rooms where roomType = '$room' LIMIT 1";
                
                $roomTry = $db -> query($getFreeRoom);
                if($roomTry){
                    echo '<br>Free room available for booking<br>';

                    // Return Room ID of available room
                    while($roomEntity = $roomTry -> fetch_assoc()){
                        $roomID = $roomEntity['roomID'];
                    }

                    // Check if NEw Booking is within range
                    $getRoomBookingRange = "SELECT * FROM hotelBookedRooms WHERE roomID = '$roomID' ";

                    $checkBookingRange = $db -> query($getRoomBookingRange);
                    if($checkBookingRange){
                        echo '<br> Qeury Ran Successfully -- NO SQL error in range check <br>';
                        if($checkBookingRange -> num_rows > 0){
                            echo '<br> Room has existing range <br>';

                            // Rnage Check Function
                            function rangeCheck($oneStart, $oneEnd, $twoStart, $twoEnd){

                                // Convert all variables to Valid dates
                                $oneStart = strtotime($oneStart);
                                $oneEnd = strtotime($oneEnd);
                                $twoStart = strtotime($twoStart);
                                $twoEnd = strtotime($twoEnd);
                                

                                // Check What is outputted
                                echo "One Start: ". $oneStart . "<br> One End: ". $oneEnd . "<br><hr>";
                                echo "Two Start Start: ".$twoStart . "<br> Two End: ".  $twoEnd . "<br>";


                                // Check agaisnt dates to detrimine ranges
                                if ($twoStart > $oneEnd){
                                    // Okay - Rnages dont tpuuch
                                    return true;
                                }
                                else if($twoStart < $oneEnd){
                                    // Not okay - Compare with satrt date
                                    if($twoEnd < $oneStart){
                                        // Okay -- Valid ranges dont touch
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }else{
                                    // They are eqaul --- no match
                                    return false;
                                }
                            }
                            
                            $checkRangesStatuses = array();
                            while($roomRange = $checkBookingRange -> fetch_assoc()){
                                $entryDate = $roomRange['bookingStartRange'];
                                $finDate = $roomRange['bookingEndRange'];
                                

                                if(rangeCheck($entryDate, $finDate, $startDay, $finDay) === true){
                                    echo '<br> <br>Okay Range <br><br>';
                                    $checkRangesStatuses[] = true;
                                }else{
                                    echo '<br><br> Range Does not fit <br><br>';
                                }
                            }
                            
                            // Check whats inide teh check list // IF FLase exists -- it means range will overlap therefore cnat make booking
                            print_r($checkRangesStatuses);

                            // Insert into Hotel Room Bookings Function
                            function intoHotelRooomBooking(){

                                // Globalise vaiables
                               global  $roomID, $bookingID, $startDay, $finDay, $db;

                                // Inserting into HotelRoomBookings
                                $intoHotelRoomBookings = "INSERT INTO hotelBookedRooms (roomID, bookingID, bookingStartRange, bookingEndRange) VALUES (
                                    '$roomID',
                                    '$bookingID',
                                    '$startDay',
                                    '$finDay'
                                )";
                                // Booking only to be made if applied range does not overlap
                                $intoTableHRB = $db -> query($intoHotelRoomBookings);
                                if($intoTableHRB){
                                
                                    // MAke sure that same room is nor available again
                                    $updateRoom = "UPDATE rooms SET roomAvailability = 'booked' WHERE roomID = '$roomID'";
        
                                    $checkAgainstUpdate = $db -> query($updateRoom);
                                    if($checkAgainstUpdate){
                                        echo "<br> Room Availability has been Updated <br>";
                                    }else{
                                        echo "<br> Faiel to Update RooOM Availabillty";
                                        echo $db -> error;
                                    }
        
                                    echo '<br> NEw Room Booking Successfullly Made <br>';
                                }else{
                                    echo '<br> Room Booking Was not made <br> Error in your COde Martin <br>';
                                    echo $db -> error;
                                }
                            }

                            // ONly run function of fase does not exist
                            if(!in_array(true, $checkRangesStatuses)){
                                // Dont run function
                                echo '<hr> <hr> Range will not persist !!!!! <hr><hr>';
                            }else{
                                // Run Function
                                intoHotelRooomBooking();
                                echo '<hr><hr> Range is okay --- Booking can be made <hr><hr>';
                            }
                        }else{
                            echo '<br> Room has not ben Booked jsut as yet <br>';
                        }
                    }else{
                        'Error in SQL Syntax';
                        echo $db -> error;
                    }
                    
                    

                }else{
                    echo '<br>Either NO free ROOm or <br> Error in COde';
                    echo $db -> error;
                }
            }
        }
        }else{
            echo 'Booking ID could not be retrived';
            echo $db -> error;
        }
    }

?>