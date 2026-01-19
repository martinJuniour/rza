<?php
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

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['proceedToPayment'])){

    // Fisrt Iinsert into Temp Customers table
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $contact = $_POST['contact'];
        $dateOfVisitation = $_POST['dateOfVisit'];
        $ticketQty = $_POST['numOfTickets'];
        if($_SESSION['login'] = true){
            $customerID = $_SESSION['ID'];
        }


        // Test to see state of login

        // if($_SESSION['login'] = true){
        //     echo "Thsi is the customer ID : " . $_SESSION['ID'];
        // }else{
        //     echo 'Login is false';
        // }

        if(!isset($_SESSION['ID'])){
            $insert = "INSERT INTO tempCustomerSafari (firstName, lastName, contact) VALUES (
                '$firstName',
                '$lastName',
                '$contact'
            )";
        }else{
            $insert = "INSERT INTO tempCustomerSafari (customerID, firstName, lastName, contact) VALUES (
                '$customerID',
                '$firstName',
                '$lastName',
                '$contact'
            )";
        }

        $run = $db -> query($insert);
        if($run){
            echo "<br><br> Successfu;; Booking made to tempCustomerBooking<br><br>";
        }else{
            echo $db -> error;
            echo '<br><br> Error in TEmp Customer Booking <br><br>';
        }

        // Second Iinsert ino Safari Bookings table

        // Retrive tempCustomerID 
        $getID = "SELECT * FROM tempCustomerSafari WHERE contact = '$contact'";
        $checkID = $db -> query($getID);
        if($checkID){
            echo ' <br><br> Successfull ID Retrival <br><br>';
            if($checkID -> num_rows > 0){
                echo "<br><br>Get ID number of rows is more than 0";
                while($userID = $checkID -> fetch_assoc()){
                    $customerTempID = $userID['customerTempID'];
                }
            }else{
                echo "<br><br>Get ID number of rows is not more than 0";
            }
        }else{
            echo "<br><br> Error in ID retrival <br><br>";
        }

        $pricePayed = $ticketQty * 26.99;

        $insertBooking = "INSERT INTO safariTicketBookings (customerTempID, ticketQty, pricePayed, dateOfVisitation) VALUES (
            '$customerTempID',
            '$ticketQty',
            '$pricePayed',
            '$dateOfVisitation'
        )";

        $bookingStatus = $db -> query($insertBooking);
        if($bookingStatus){
            echo "<br><br> Booking made Succesfuuly <br><br>";
        }else{
            echo "<br><br> Booking NOT made Succesfuuly <br><br>";
        }

    }

}

?>