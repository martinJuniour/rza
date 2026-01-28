<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="temp.css">
    <link rel="stylesheet" href="../../home/constants.css">
    <link rel="stylesheet" href="temp-media.css">
    <script src="../../home/utilis.js" defer></script>
</head>

<body>
    <main class="loginMain">
        <header>

            <!-- Top banner with search bar -->
            <section class="banner">
                <div class="logo">
                    <img src="../../images/RZA-images/logo.svg" alt="RZA Logo">
                </div>
                <div class="items">
                    <div class="search">
                        <img src="../../images/RZA-images/searchIcon.svg" alt="Search Icon">
                        <input type="text" id="search" placeholder="Enter a Search Item...">
                    </div>

                    <div class="nav-btn">
                        <img src="../../images/menu.png" id="nav-btn">
                    </div>
                </div>
            </section>
            <!-- main nav bar -->
            <nav>
                <div class="cancel">
                    <p id="close-nav">
                        →
                    </p>
                </div>
                <div class="nav-items">

                <div class="home">
                        <a href="../../home/index.php" class="home-link">Home</a>
                    </div>
                    <a href="../../bookings/safari-tickets/index.php">Book a Safari Ticket</a>
                    <a href="../../bookings/hotel-tickets/index.php">Book a Night in Hotel</a>
                    <a href="../../home/termsAndCs.php">Terms and Conditions</a>

                    <a href="../registration-main/index.html">Create Account</a>

                    <a href="../accessibility/index.php">Accessebility Settings</a>
                    <a href="../../home/policyLinks.php">All Legal : RZA</a>
                    <a href="../../home/contact.php">Report an Issue</a>
                </div>
            </nav>

        </header>

            <!-- Login message styling -->
    <style>
        .successfull-login {
            background-color: green;
            ;
            color: white;
            text-align: center;
            /* padding: .1%; */
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10000000;
            transition: all 0.3s ease-in-out;
        }
    </style>

    <!-- Login message -->
    <section class="successfull-login" id="login"></section>

    <!-- Login dislay logic -->
    <script>

        // Function only runs one time
        const check = "<?php echo $_SESSION['exists']; ?>";

        // If check is not empty --- Login Checked is existing
        if (check === "true") {
            window.addEventListener('DOMContentLoaded', () => {
                loginMessage();
            });
            console.log(check);
            <?php
            
            $_SESSION['exists'] = [];

            ?>
        }
        // IF it is empty - Login Check has been delete dor didnt exist at All
        else{
            console.log('Login is not current');
        }

        // Source - https://stackoverflow.com/a
        // Posted by Lew, modified by community. See post 'Timeline' for change history
        // Retrieved 2026-01-25, License - CC BY-SA 3.0
        function loginMessage() {
            var message = document.getElementById("login")
            var originalContent = message.innerHTML
            message.innerHTML = "Looks Like you have an account with US -- Login Below";
            setTimeout(function () {
                message.innerHTML = originalContent
            }, 6000)
        }

    </script>

        <section class="content">
            <div class="headings">
                <span class="bold white">
                    <h1>Welcome back</h1>
                </span>
                <br>
                <span class="bold white">
                    <h2>Login below</h2>
                </span>
            </div>

            <section class="no-headings">
                <section class="input">
                    <form action="login.php" method="post">
                        <input type="email" name="userName" id="userName" placeholder="Enter your email Address">
                        <br>
                        <input type="password" name="pass" id="pass" placeholder="Enter your password">
                        <br>
                        <div class="action">
                            <input type="submit" value="Login" name="login" class="login btn btn-success">
                            <a href="">Forgot Password</a>
                        </div>
                    </form>
                </section>


                <section class="register">
                    <a class="btn btn-warning" href="../registration-main/index.html">I'm new to RZA</a>
                </section>

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
                <a href="../../home/policyLinks.php#privacy">Privacy Policy</a>
                <a href="../../home/policyLinks.php#environmental">Environmental Policy</a>
                <a href="../../home/policyLinks.php#customer">Customer Policy</a>
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