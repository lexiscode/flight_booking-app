<?php 

require "db_connect.php"; 

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


?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminStyle.css">
   
</head>

<body>
    <h1 id="h1" style="color: white;">Airline Booking Form</h1>
    <div id="list" class="header">
        <h2>Database (Booking List)</h2>
        <form action="" method="POST">
            <div class="container">

            <?php if(!empty($all_data)): ?>
                <ul>
                    <?php foreach ($all_data as $data): ?>
                        <li>
                            <article>
                                <!-- htmlspecialchars() prevents XSS attack or code injections -->
                                <h2><?= htmlspecialchars($data["customer_name"]) ?></h2> 
                                <p><?= htmlspecialchars($data["email"]) ?></p>
                                <p><?= htmlspecialchars($data["phone_no"]) ?></p>
                                <p><?= htmlspecialchars($data["adults"]) ?></p>
                                <p><?= htmlspecialchars($data["children"]) ?></p>
                                <p><?= htmlspecialchars($data["infants"]) ?></p>
                                <p><?= htmlspecialchars($data["location_from"]) ?></p>
                                <p><?= htmlspecialchars($data["location_to"]) ?></p>
                                <p><?= htmlspecialchars($data["booking_time"]) ?></p>
                                <p><?= htmlspecialchars($data["booking_date"]) ?></p>
                                <p><?= htmlspecialchars($data["airline"]) ?></p>
                                <p><?= htmlspecialchars($data["fare"]) ?></p>
                                <p><?= htmlspecialchars($data["seat"]) ?></p>
                                <p><?= htmlspecialchars($data["customer_message"]) ?></p>


                                <a href="edit_article.php?id=<?= $data['id']; ?>">Edit</a>

                                <form method= "POST" action="delete_article.php?id=<?= $data['id']; ?>">
                                    <button type="submit" name="delete">Delete</button>
                                </form>
                                
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




