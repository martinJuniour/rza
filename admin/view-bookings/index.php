<?php

include("../../home/db.php");
// if($db){
//     echo 'Successfull Connection';
// }else{
//     echo 'Failed to Connect to Db';
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="utilis.js" defer></script>
    <link rel="stylesheet" href="temp.css">
</head>

<body>
    <main>
        <section class="content">
            <h1>Ridget Zoo Adventures</h1>
            <h3>This page is only available to Administartors</h3>
            <br><br>
            <div class="top">
                <section class="new">
                    <br>
                    <h2>RZA Rooms</h2>
                    <br>
                    <form action="newRoom.php" method="post">
                        <label for="roomType">Room type</label><br><br>
                        <select name="roomType" id="roomType">
                            <option value="single">Single Bed</option>
                            <option value="double">Double Bed</option>
                            <option value="mixed">Family Room</option>
                        </select>

                        <br><br>

                        <label for="availability">Room Availability</label><br><br>
                        <select name="availability" id="availability">
                            <option value="free">Available</option>
                            <option value="booked">Not - Available</option>
                        </select>
                        <br><br>

                        <input type="submit" class="btn btn-success" name="newRoom" id="newRoom" value="Post New Room">
                    </form>
                </section>

                <section class="prices">
                    <table class="prices">
                        <tr>
                            <th>Room Type</th>
                            <th>Unit Price per Night</th>
                        </tr>
                        <tr>
                            <td>Single</td>
                            <td>£100</td>
                        </tr>
                        <tr>
                            <td>Double</td>
                            <td>£169</td>
                        </tr>
                        <tr>
                            <td>Mixed</td>
                            <td>£209</td>
                        </tr>
                    </table>
                </section>
            </div>
            <br><br>

            <hr>

            <section class="current">
                <table>
                    <tr class="headers">
                        <th>Room ID</th>
                        <th>Room Type</th>
                        <th>Room Availability</th>
                        <th>Bookings</th>
                    </tr>
                    <?php

                    $getRooms = "SELECT * FROM rooms";
                    $get = $db->query($getRooms);
                    if ($get) {
                        if ($get->num_rows > 0) {
                            while ($room = $get->fetch_assoc()) {

                                ?>
                                <tr>
                                    <td><?php echo $room['roomID']; ?></td>
                                    <td><?php echo $room['roomType']; ?></td>
                                    <td class="availability"><?php echo $room['roomAvailability']; ?></td>
                                    <td><?php echo $room['bookings']; ?></td>
                                </tr>

                                <?php


                            }
                        }
                    }

                    ?>
                </table>
            </section>
        </section>
    </main>
</body>

</html>