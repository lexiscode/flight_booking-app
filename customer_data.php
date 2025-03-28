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


// download to pdf file
if (isset($_POST['download'])){
    header("Location: http://localhost/flight_booking-app/print_pdf.php?id={$data['id']}");
    exit;
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <link href="./stylings/customer_data.css" rel="stylesheet">
</head>
<body>

    <h1><a href="http://localhost/flight_booking-app/index.php" style="text-decoration: none">AeroLux Airline Booking Form</a></h1>

    <div>
        <?php if ($data !== null): ?>

            <article>

                <?php if ($data["image_file"]): ?>
                    <img src="http://localhost/flight_booking-app/uploads/<?= $data["image_file"]; ?>" alt="">
                <?php endif; ?>

                <h2><?php echo ["customer_name"]; ?></h2> 
                <p><b>ID:</b> <?php echo $data["id"]; ?></p>
                <p>Email: <?php echo $data["email"]; ?></p>
                <p>Phone Number: <?php echo $data["phone_no"];?></p>
                <p>Number of Traveler(s): <?php echo $data["crew"];?></p>
                <p>Destination: <?php echo $data["location_to"];?></p>
                <p>Booking Time: <?php echo $data["booking_time"];?></p>
                <p>Booking Date: <?php echo $data["booking_date"];?></p>
                <p>Airline: <?php echo $data["airline"];?></p>
                <p>Fare: <?php echo $data["fare"];?></p>
                <p>Seat: <?php echo $data["seat"];?></p>
                <p>Your Message: <?php echo $data["customer_message"];?></p>

                <form action="" method="POST">
                    <button id="pdf" type="submit" name="download">Download PDF</button>
                </form>

            </article>

            <p class="booking_link"><i>Click here to return to the <a href="http://localhost/flight_booking-app/index2.php">booking form</a></i></p>
            
        
        <?php else: ?>
            <p>No data found.</p>
        <?php endif; ?>
    </div>
    
    
</body>
</html>

