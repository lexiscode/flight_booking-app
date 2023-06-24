<?php

require "includes/db_connect.php";
require "includes/auth.php";

// error handler function
function myErrorHandler($errno, $errstr){
    echo "<b>Error:</b> [$errno] $errstr";
}
// set error handler function
set_error_handler("myErrorHandler");

// Initialize the session.
session_start();

// Defining the variables in the global
$name = ''; $email = ''; $phone_no = ''; $crew = ''; $to = ''; $time = ''; $date = ''; $airline = ''; 
$fare = ''; $seat = ''; $message = '';


// Check if a new form is submitted and its not empty, then add it to the database
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['save'])){

        require "includes/display_upload.php";

        $customer_name = trim(htmlspecialchars($_POST['name']));
        $booking_date = trim($_POST['date']);
        $booking_time = trim($_POST['time']);
        $location_to = trim($_POST['to']);
        $customer_message = trim(htmlspecialchars($_POST['message']));
        $phone_no = trim(htmlspecialchars($_POST['phone_no']));
        $email = trim(htmlspecialchars($_POST['email']));
        $seat = trim($_POST['seat']);
        $airline = trim($_POST['airline']);
        $fare = trim($_POST['fare']);
        $crew = trim($_POST['crew']);

  

        if (!empty($customer_name) && !empty($booking_date) && !empty($booking_time) && !empty($location_to)  && !empty($phone_no)  && !empty($email)  && !empty($seat)
            && !empty($airline) && !empty($fare)  && !empty($crew)){
                
            // makes the message field "null" if not filled
            if ($customer_message == ''){
                $customer_message = null;
            }

            // connect to the database server
            $conn = connectDB();

            // inserts the data into the database server
            $sql = "INSERT INTO passengers_record (image_file, customer_name, email, phone_no, crew, location_to, booking_time, booking_date, airline, fare, seat, customer_message)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Prepares an SQL statement for execution
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt === false){
                echo mysqli_error($conn);
            } else {
                // i - integer, d - double, s - string
                // Bind variables for the parameter markers in the SQL statement prepared
                mysqli_stmt_bind_param($stmt, "ssssssssssss", $filename, $customer_name, $email, $phone_no, $crew, $location_to, $booking_time, $booking_date, $airline, $fare, $seat, $customer_message);

                // Executes a prepared statement
                $results = mysqli_stmt_execute($stmt);

                // checking for errors, if none, then redirect the user to the new article page
                if ($results === false){
                    echo mysqli_stmt_error($stmt);
                } else {

                    //Returns the value generated for an AUTO_INCREMENT column by the last query
                    $id = mysqli_insert_id($conn);
                    
                    // it is more advisable to use absolute paths below than relative path
                    header("Location: http://localhost/flight_booking-app/customer_data.php?id=$id"); 
                    exit;
                }
            }

        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flight Booking App</title>
    <link rel="stylesheet" href="./stylings/style.css">
</head>

<body>

    <h1>AeroLux Airline Booking Form</h1>

    <div class="container">
        
        <form method="POST" id="booking" enctype="multipart/form-data">
            <?php require "./includes/the_form.php" ?>
            <br>

            <div>
                <label for="file">Image File</label>
                <!--if "multiple" attribute is added below, it will allow for multiple uploads-->
                <input type="file" name="file" id="file">
            </div>


            <br> <br>

            <div align="center">
                <input type="submit" id="home_submit" value="Submit" name="save">
                <input type="reset" id="home_clear" value="Clear Form">
            </div>

        </form>
        

        <!-- Working with Sessions-->
        <center>
        <?php if (isLoggedIn()) : ?>
            <p>You are logged in. <a href="logout.php">Logout</a></p>
            <!-- only logged in user should access this link below-->
            <a href="admin_page.php" target="_blank">Go To Database</a>
        <?php else : ?>
            <p>Are you an admin? If yes, <a href="login.php" target="_blank">Login</a>!</p>
        <?php endif; ?>
        </center>

    </div>
    
</body>

</html>






