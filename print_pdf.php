<?php

use Dompdf\Dompdf;

require "includes/db_connect.php";
require "includes/get_customer_data_id.php";
// include Dompdf library
require_once 'vendor/autoload.php';

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


// Install Dompdf
//bash: composer require dompdf/dompdf

ob_start(); // Start output buffering
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
                <h2><?php echo htmlspecialchars($data["customer_name"]); ?></h2> 
                <p><b>ID:</b> <?php echo htmlspecialchars($data["id"]); ?></p>
                <p>Email: <?php echo htmlspecialchars($data["email"]); ?></p>
                <p>Phone Number: <?php echo htmlspecialchars($data["phone_no"]);?></p>
                <p>Number of Traveler(s): <?php echo $data["crew"];?></p>
                <p>Destination: <?php echo $data["location_to"];?></p>
                <p>Booking Time: <?php echo $data["booking_time"];?></p>
                <p>Booking Date: <?php echo $data["booking_date"];?></p>
                <p>Airline: <?php echo $data["airline"];?></p>
                <p>Fare: <?php echo $data["fare"];?></p>
                <p>Seat: <?php echo $data["seat"];?></p>
                <p>Your Message: <?php echo htmlspecialchars($data["customer_message"]);?></p>
            </article>

            <p class="booking_link"><i>Click here to return to the <a href="http://localhost/flight_booking-app/index2.php">booking form</a></i></p>
            
        
        <?php else: ?>
            <p>No data found.</p>
        <?php endif; ?>
    </div>
    
    
</body>
</html>

<?php

$html = ob_get_clean(); // Get the buffered output and clean the buffer



//Create a new Dompdf instance
$dompdf = new Dompdf();

// Load HTML contents
$dompdf->loadHtml($html);

// Set options, such as paper size, orientation, font, etc.
$dompdf->setPaper('A4', 'portrait');

// Render the PDF
$dompdf->render();

// Output the PDF to the browser
$dompdf->stream('output.pdf', ['Attachment' => false]);
?>

