<?php

require "includes/db_connect.php";
require "includes/get_customer_data_id.php";

// connect to the database server
$conn = connectDB();

// This gets the id from the browser tab when the save button was clicked in the new article page
if (isset($_GET['id'])){

    // Reading from the database to get specific article row by their id
    $data = getCustomerData($conn, $_GET['id']); // this holds an associative array
    
} else {
    // no error message printed when there's no id included in the url link
    $data = null; 
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
</head>
<body>

    <h1 align="center"><a href="http://localhost/flight_booking/index2.php" style="text-decoration: none">-- Flight Booking System --</a></h1>

    <?php if ($data !== null): ?>

        <article>
            <h2><?php echo htmlspecialchars($data["customer_name"]); ?></h2> 
            <p>Email: <?php echo htmlspecialchars($data["email"]); ?></p>
            <p>Phone Number: <?php echo $data["phone_no"];?></p>
            <p>Number of Adult(s): <?php echo $data["adults"];?></p>
            <p>Number of Children: <?php echo $data["children"];?></p>
            <p>Number of Infants: <?php echo $data["infants"];?></p>
            <p>Current Location: <?php echo $data["location_from"];?></p>
            <p>Destination: <?php echo $data["location_to"];?></p>
            <p>Booking Time: <?php echo $data["booking_time"];?></p>
            <p>Booking Date: <?php echo $data["booking_date"];?></p>
            <p>Airline: <?php echo $data["airline"];?></p>
            <p>Fare: <?php echo $data["fare"];?></p>
            <p>Seat: <?php echo $data["seat"];?></p>
            <p>Your Message: <?php echo $data["customer_message"];?></p>
        </article>
        
    
    <?php else: ?>
        <p>No data found.</p>
    <?php endif; ?>
    
</body>
</html>
