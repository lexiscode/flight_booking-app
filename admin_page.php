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



// INDEX FORM INSERTION BELOW (COPIED FROM INDEX PAGE)

// Defining the variables in the global
$name = ''; $email = ''; $phone_no = ''; $crew = ''; $to = ''; $time = ''; $date = ''; $airline = ''; 
$fare = ''; $seat = ''; $message = '';


// Check if a new form is submitted and its not empty, then add it to the database
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['save'])){

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
            $sql = "INSERT INTO passengers_record (customer_name, email, phone_no, crew, location_to, booking_time, booking_date, airline, fare, seat, customer_message)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Prepares an SQL statement for execution
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt === false){
                echo mysqli_error($conn);
            } else {
                // i - integer, d - double, s - string
                // Bind variables for the parameter markers in the SQL statement prepared
                mysqli_stmt_bind_param($stmt, "sssssssssss", $customer_name, $email, $phone_no, $crew, $location_to, $booking_time, $booking_date, $airline, $fare, $seat, $customer_message);

                // Executes a prepared statement
                $results = mysqli_stmt_execute($stmt);

                // checking for errors, if none, then redirect the user to the new article page
                if ($results === false){
                    echo mysqli_stmt_error($stmt);
                } else {

                    //Returns the value generated for an AUTO_INCREMENT column by the last query
                    $id = mysqli_insert_id($conn);
                    
                    // it is more advisable to use absolute paths below than relative path
                    header("Location: http://localhost/flight_booking-app/admin_page.php"); 
                    exit;
                }
            }

        }
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FLIGHT BOOKING APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body style="background-color: #025464"> 

  <div class="container">
        <!--Introduction header-->
        <h1 class="text-center my-4 py-4" style="font-family: Tahoma, Verdana, Segoe, sans-serif; color: white">AeroLux Airline Booking System</h1>

        <div class="container text-center">
            <div class="row">
                <!-- GRID 1 -->
                <div class="col">
                    
                    <!-- Button trigger modal -->
                    <div align="right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Reserve Now!
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="POST" autocomplete="off">
                        <div class="modal-content" style="background-color: gray">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: white">Book a Flight Now</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="w-55 m-auto">

                                <!--HTML form-->
                                <?php require "./includes/admin_form.php"; ?>
            
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="save">Submit</button>
                        </div>
                        </div>
                        </form>
                    </div>
                    </div>

                </div>
                <!-- GRID 2 -->
                <div class="col" align="left">
                    
                    <form action="" method="POST">
                        <button type="submit" class="btn btn-secondary" name="clear_all">Clear Lists</button>
                    </form>
                
                </div>
            </div>
        </div>

        
        <br>

        <!--Horizontal line demacation-->
        <hr class="bg-dark w-50 m-auto">

        <!-- Table class="w-50 m-auto"-->
        <div class="container-fluid">
            
            <div style="margin: 25px 50px 25px 50px; background-color: black; color: white; border-radius:20px">
                <h1 align="center">Booking Database Table</h1>
            </div>

            <table class="table table-dark table-hover">
                <thead align="center">
                    <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Crew</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Booking Time</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Airline</th>
                    <th scope="col">Fare</th>
                    <th scope="col">Seat</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>

                <?php if (!empty($all_data)): ?>

                <tbody align="center">

                    <?php foreach ($all_data as $index => $data): ?>
                    <tr>
                        <td>AIR<?= $data["id"]; ?></td> 
                        <td><?= htmlspecialchars($data["customer_name"]) ?></td> 
                        <td><?= htmlspecialchars($data["email"]) ?></td>
                        <td><?= htmlspecialchars($data["phone_no"]) ?></td>
                        <td><?= htmlspecialchars($data["crew"]) ?></td>
                        <td><?= htmlspecialchars($data["location_to"]) ?></td>
                        <td><?= htmlspecialchars($data["booking_time"]) ?></td>
                        <td><?= htmlspecialchars($data["booking_date"]) ?></td>
                        <td><?= htmlspecialchars($data["airline"]) ?></td> 
                        <td><?= htmlspecialchars($data["fare"]) ?></td>
                        <td><?= htmlspecialchars($data["seat"]) ?></td>
                        <td><?= htmlspecialchars($data["customer_message"]) ?></td>
                        <td><a class="btn btn-primary" href="edit_data.php?id=<?= $data["id"]; ?>">Edit</a> <a class="btn btn-danger" href="delete_data.php?id=<?= $data['id']; ?>">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            <?php else: ?>
                <p style="color: white;">No articles found.</p>
            <?php endif; ?>

            </table>

            

            
            <div align="center">
                <i><a class="btn btn-link" href="index.php" role="button" style="color: white">Back to Homepage</a></i>
            </div>
            
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>