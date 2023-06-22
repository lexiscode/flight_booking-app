<?php

require "includes/db_connect.php";
require "includes/get_customer_data_id.php";

// connect to the database server
$conn = connectDB();

// READING or RETRIEVING from the database to get specific article post by their ids
if (isset($_GET['id'])){

    // checks if the article's id exits in the database, then returns an associative array, which stores in $article variable
    $data = getCustomerData($conn, $_GET['id']); // associative array

    if ($data){
        // Get array values from its keys, which then is stored as values in the HTML form below
        $customer_name = $data['customer_name'];
        $email = $data['email'];
        $phone_no = $data['phone_no'];
        $adults = $data['crew'];
        $location_to = $data['location_to'];
        $booking_time = $data['booking_time'];
        $booking_date = $data['booking_date'];
        $airline = $data['airline'];
        $fare = $data['fare'];
        $seat = $data['seat'];
        $customer_message = $data['customer_message'];
    } else {
        // if a non-existing id number is in the link
        die("Invalid ID. No data found");
    }

} else {
    // if no id is in the link
    die("ID not supplied. No data found");
}



// REPEAT VALIDATION, no need declaring of variables anymore
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['save'])){

        $id = $data['id']; // get id for which we wish to edit from
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
    

        if (!empty($customer_name) && !empty($booking_date) && !empty($booking_time) && !empty($location_to)  && !empty($customer_message)  && !empty($email)  && !empty($seat)
            && !empty($airline) && !empty($fare) && !empty($crew)){
                
            // makes the message field "null" if not filled
            if ($customer_message == ''){
                $customer_message = null;
            }


            // connect to the database server
            $conn = connectDB();
            
            // update the data into the database server
            $sql = "UPDATE passengers_record 
                    SET customer_name = ?, email = ?, phone_no = ?, crew = ?, location_to = ?, booking_time = ?, booking_date = ?, airline = ?, fare = ?, seat = ?, customer_message = ?
                    WHERE id = ?";

            // Prepares an SQL statement for execution
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt === false){
                echo mysqli_error($conn);
            } else {

                // Bind variables for the parameter markers in the SQL statement prepared
                // $id parameter must be included here at the end of the statement
                mysqli_stmt_bind_param($stmt, "sssssssssssi", $customer_name, $email, $phone_no, $crew, $location_to, $booking_time, $booking_date, $airline, $fare, $seat, $customer_message, $id);

                // Executes a prepared statement
                $results = mysqli_stmt_execute($stmt);

                // checking for errors, if none, then redirect the user to the new article page
                if ($results === false){
                    echo mysqli_stmt_error($stmt);
                } else {

                    //Returns the value generated for an AUTO_INCREMENT column by the last query
                    $id = mysqli_insert_id($conn);
                    
                    // it is more advisable to use absolute paths below than relative path
                    header("Location: http://localhost/flight_booking-app/admin_page.php?id=$id"); 
                    exit;
                }
            }



        }
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <link rel="stylesheet" href="stylings/style.css"/>
</head>
<body>
    <h1 align="center" id="h1"><a href="http://localhost/lexispress_cms-app/index.php" style="color:white; text-decoration: none">Airline Booking Form</a></h1>
    <div class="container">
        <h2 align="center">Update Customer's Data</h2>

        <form action="" method="POST">
            <!-- HTML form which is specially for holding old data values by getting them from the database -->
            <?php require "./includes/the_form_retrieve.php"; ?>

            <div align="center">
                <button type="submit" name="save">UPDATE NOW!</button>
                <input type="reset" value="Clear Form">
            </div>
        </form>
    </div>  

</body>
</html>



