<?php
session_start();
// MAke sure that thank you page is only displayed after account creation
if(isset($_SESSION['register'])){
    if($_SESSION['register']){
        echo 'Ok';
        // Empty the session
        $_SESSION = [];
    }else{
        echo 'You need to make an account first';
        header("Location: ../../home/index.html");
    }
}else{
    echo 'YOu havent tried to make an accont';
    header("Location: ../../home/index.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"><script src="/htdocs/home/mainAccess.js" defer></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="temp.css">
    <link rel="stylesheet" href="temp-media.css">
    <title>Registerd</title>
    <style>
        main{
            background-image: url('../../images/RZA-images/pills.png');
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 500px;
        }
        .complete {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            text-align: center;
        }
        .complete a{
            padding: 10%;
            width: 100%;
        }
    </style>
</head>

<body>
    <main>
        <section class="complete">
            <h1><span class="bold">Well Done</span></h1>
            <h1>Account Created Sucecssfully</h1>
            <a href="../../home/index.html" class="btn btn-success">Go back home</a>
        </section>
    </main>

    <!-- Footer Section : constant on all pages -->
    <footer>
        <div class="col-1">
            <h4>Where can you Find Us</h4>
            <div class="addrr">
                <img src="../../images/RZA-images/addressFooter.png" alt="Address Icon">
                <p>Address</p>
                <p>Head Qaurters Addess</p>
            </div>
        </div>

        <div class="col-2">
            <h4>Policy Links</h4>
            <div class="links">
                <a href="">Privacy Policy</a>
                <a href="">Environmental Policy</a>
                <a href="">Customer Policy</a>
            </div>
        </div>

        <div class="col-3">
            <h4>About This Website</h4>
            <p>
                The fist man to walk on the earth was Martin Juniour - That was because he didnt know Satoru Gojo
            </p>
        </div>

        <div class="accessebility">
            <a href=""><img src="../../images/RZA-images/access.svg" alt="Accessibility Icon"></a>
            <h4>Accessebility</h4>
            <p>
                Finally, don’t miss our makeshift pop-up events, which can include keeper
                talks, feeding times, mini trails, and weekend activity zones that appear on selected days. Check
                the Events page for the latest schedule, and you’ll be able to build a simple route through the zoo
                that fits your time, energy, and interests.
            </p>
        </div>

    </footer>
</body>

</html>