<?php
// TEsting Succesful Data BAse connection
include("../../home/db.php");
session_start();
$_SESSION['login'] = false;
// if($db){
//     echo 'successull connection';
// }else{
//     echo 'Error connection to Database';
// }
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['login'])){
        $userName = $_POST['userName'];
        $passCode = $_POST['pass'];

        $checkUser = "SELECT * from customers WHERE username = '$userName'";
        $user = $db -> query($checkUser);
        if($user){
            if($user -> num_rows > 0){  
                while ($one = $user -> fetch_assoc()){  
                    $passWord = $one['passcode'];
                    if(password_verify($passCode, $passWord)){
                        echo 'Good Step <br>';
                        $_SESSION['login'] = true;
                        $_SESSION['ID'] = $one['customerID'];  
                        $_SESSION['firstName'] = $one['firstName']; 
                        header('Location: ../../home/index.php');
                    }else{
                        echo 'wrong password';
                        $_SESSION['login'] = false;
                    }
                }
            }else{
                echo 'Numner of rows is not more than 0: No such user';
            }
        }else{
            echo 'Query did not run successfully';
        }

    }

}
?>