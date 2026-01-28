<?php
// TEsting Succesful Data BAse connection
include("../../home/db.php");
session_start();
$_SESSION['register'] = false;
// if($db){
//     echo 'successull connection';
// }else{
//     echo 'Error connection to Database';
// }
?>

<?php

// Begining of data PRocessing and PArsing to Database
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['createAccount'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $userName = $_POST['userName'];
        // Hashing the password -- use password_verify() to check for login
        $passCode = password_hash($_POST['passWord'], PASSWORD_BCRYPT);
        $marketing = $_POST['marketing'];
        $postalCode = $_POST['postalCode'];


        // Check if Customer Exists
        $check = $db -> query("SELECT username AS username FROM customers WHERE username = '$userName'");
        if($check -> num_rows > 0){
            echo 'Looks Like you have an account with US -- Login Below';
            $_SESSION['exists'] = 'true';
            header("Location: ../login-main/index.php");
        }else{
            $insert = "INSERT INTO customers (firstName, lastNAme, username, passcode, marketing, postalCode) VALUES (
                '$firstName',
                '$lastName',
                '$userName',
                '$passCode',
                '$marketing',
                '$postalCode'
            )";
    
            $run = $db -> query($insert);
            if($run){
                // echo 'SUCCESS ACCOUNT REGISTRATION';
                $_SESSION['register'] = true;
                header("Location: done.php");
            }else{
                echo $db -> error;
                echo 'Error';
            }
        }
    }

}

?>