<?php 

require "includes/db_connect.php"; 
require "includes/auth.php";

// Initialize the session.
session_start();

// NB: This below will no longer be necessary if you won't be displaying the new article link page for non-login users
if (!isLoggedIn()){
    
    die("Unauthorized. You must be logged in first." . PHP_EOL . "<a href='index.php'>Back To Homepage</a>");
}


// connect to the database server
$conn = connectDB();

// READING FROM THE DATABASE AND CHECKING FOR ERRORS
$sql = "SELECT * 
        FROM passengers_record 
        ORDER BY booking_date, booking_time DESC;";

$results = mysqli_query($conn, $sql); 

if ($results === false)
    echo mysqli_error($conn);
else
    $all_data = mysqli_fetch_all($results, MYSQLI_ASSOC);
    //print_r($all_data);  prints an associative array


// Check if the "Clear All" button was clicked
if(isset($_POST['clear_all'])) {
    
    // SQL query to delete all data from the table
    // $sql = DELETE FROM rooms_record
    $sql = "TRUNCATE TABLE passengers_record";

    // Execute the SQL query
    mysqli_query($conn, $sql);

    header("Location: http://localhost/flight_booking-app/admin_page.php");
    exit;
}

?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylings/adminStyle.css">
   
</head>

<body>
    <h1 id="h1" style="color: white;">Airline Booking Form</h1>
    <div id="list" class="header">
        <h2>Database (Booking List)</h2>
        <form action="" method="POST">
            <div class="container">

            <form action="" method="POST">
                <button type="submit" name="clear_all">Clear Lists</button>
            </form>

            <?php if(!empty($all_data)): ?>
                <ul>
                    <?php foreach ($all_data as $data): ?>
                        <li>
                            <article>
                                <!-- htmlspecialchars() prevents XSS attack or code injections -->
                                <h2>Customer Name: <?= htmlspecialchars($data["customer_name"]) ?></h2> 
                                <p>Email: <?= htmlspecialchars($data["email"]) ?></p>
                                <p>Phone Number: <?= htmlspecialchars($data["phone_no"]) ?></p>
                                <p>Adults: <?= htmlspecialchars($data["adults"]) ?></p>
                                <p>Children: <?= htmlspecialchars($data["children"]) ?></p>
                                <p>Infants: <?= htmlspecialchars($data["infants"]) ?></p>
                                <p>Current Location: <?= htmlspecialchars($data["location_from"]) ?></p>
                                <p>Destination: <?= htmlspecialchars($data["location_to"]) ?></p>
                                <p>Booking Time: <?= htmlspecialchars($data["booking_time"]) ?></p>
                                <p>Booking Date: <?= htmlspecialchars($data["booking_date"]) ?></p>
                                <p>Airline: <?= htmlspecialchars($data["airline"]) ?></p>
                                <p>Fare: <?= htmlspecialchars($data["fare"]) ?></p>
                                <p>Seat: <?= htmlspecialchars($data["seat"]) ?></p>
                                <p>Customer Message: <?= htmlspecialchars($data["customer_message"]) ?></p>

                                <p>ID: <?= $data['id']?></p>

                                <a href="edit_data.php?id=<?= $data["id"]; ?>">Edit</a>

                                <a href="delete_data.php?id=<?= $data['id']; ?>">Delete</a>

                                
                            </article>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No articles found.</p>
            <?php endif; ?>
                
                
            </div>
        </form>
    </div>
    
</body>

</html>




