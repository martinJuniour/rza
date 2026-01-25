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
    <link rel="stylesheet" href="../view-bookings/temp.css">
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
                    <h2>RZA SAfari Tickets</h2>
                    <br>
                </section>

            </div>

            <section class="prices">
                <table class="prices">
                    <tr>
                        <th>Total Tickets</th>
                        <th>Total Customers</th>
                    </tr>
                    <tr>
                        <td>
                            <?php

                            $getTotalTickets = "SELECT SUM(ticketQty) AS total from safariTicketBookings ";
                            $getTotalTicketsQ = $db -> query($getTotalTickets);
                            if ($getTotalTicketsQ) {
                                $ticketQty = $getTotalTicketsQ -> fetch_assoc();
                                echo $ticketQty['total'];
                            }else{
                                echo 'No';
                            }

                            ?>
                        </td>

                        <td>
                            <?php

                            $getTotalcusts = "SELECT COUNT(safariTicketBookingID) AS total from safariTicketBookings";
                            $getTotalcustsQ = $db -> query($getTotalcusts);
                            if ($getTotalcustsQ) {
                                $custQty = $getTotalcustsQ -> fetch_assoc();
                                echo $custQty['total'];
                            }else{  
                                echo 'No';
                            }

                            ?>
                        </td>
                    </tr>
                </table>
            </section>
            
            <br>
            <hr>

            <section class="current">
                <table>
                    <tr class="headers">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Ticket Qauntity</th>
                        <th>Visitation Date</th>
                    </tr>
                    <?php

                    $getTickets = "SELECT * FROM tempCustomerSafari";
                    $get = $db->query($getTickets);
                    if ($get) {
                        if ($get->num_rows > 0) {
                            while ($bk = $get->fetch_assoc()) {
                                $tempId = $bk['customerTempID'];
                                ?>
                                <tr>
                                    <td><?php echo $bk['firstName']; ?></td>
                                    <td><?php echo $bk['lastName']; ?></td>
                                    <?php
                                    $getBkDetails = "SELECT * FROM safariTicketBookings WHERE customerTempID = '$tempId'";
                                    $getBkDetailsQ = $db->query($getBkDetails);
                                    if ($getBkDetailsQ && $getBkDetailsQ->num_rows > 0) {
                                        while ($cust = $getBkDetailsQ->fetch_assoc()) {
                                            ?>
                                            <td><?php echo $cust['ticketQty']; ?></td>
                                            <td><?php echo $cust['dateOfVisitation']; ?></td>
                                            <?php
                                        }
                                    } else {
                                        echo 'Doesnt Exist';
                                        echo $db->error;
                                    }
                                    ?>
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