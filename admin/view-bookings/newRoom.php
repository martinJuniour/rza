<?php

include("../../home/db.php");
// if($db){
//     echo 'Successfull Connection';
// }else{
//     echo 'Failed to Connect to Db';
// }

?>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['newRoom'])){
        $roomType = $_POST['roomType'];
        $roomAvailability = $_POST['availability'];

        $insert = "INSERT INTO rooms (roomType, roomAvailability) VALUES (
            '$roomType',
            '$roomAvailability'
        )";

    }
}

?>