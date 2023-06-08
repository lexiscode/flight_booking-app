<?php

require "json_db.php";

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flight Booking App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1 id="h1">Airline Booking Form</h1>
    <div class="container">
        
        <form action="" method="POST" id="booking">
            <?php require "the_form.php" ?>

            <br> <br>

            <div align="center">
                <input type="submit" value="Submit" name="submit">
                <input type="reset" value="Clear Form">
            </div>

        </form>
        

        <!-- Working with Sessions-->

        <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>
            <p>You are logged in. <a href="logout.php">Logout</a></p>
            <!-- only logged in user should access this link below-->
            <a href="admin_page.php">Go To Database</a>
        <?php else : ?>
            <p>Are you an admin? If yes, <a href="login.php" target="_blank">Login</a>!</p>
        <?php endif; ?>


    </div>

</body>

</html>
