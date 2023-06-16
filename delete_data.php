<?php

require "includes/db_connect.php";
require "includes/get_customer_data_id.php";

// connect to the database server
$conn = connectDB();

// READING or RETRIEVING from the database to get specific article post by their ids
if (isset($_GET['id'])){

    // checks if the article's id exits in the database, then returns an associative array
    $data = getCustomerData($conn, $_GET['id']); 

    if ($data){
        // Get array values from its keys, which is used in the HTML form below
        $id = $data['id'];
    } else {
        echo "No data found from such ID to be deleted.";
    }

} else{
    echo "Invalid delete action. Page not found.";
}



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["delete"])){

        // Delete the data in the database server by its id row
        $sql = "DELETE FROM passengers_record 
                WHERE id = ?";

        // Prepares an SQL statement for execution
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false){
            echo mysqli_error($conn);
        } else {
            // Bind variables for the parameter markers in the SQL statement prepared
            mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);

            // Executes a prepared statement
            $results = mysqli_stmt_execute($stmt);

            // checking for errors, if none, then redirect the user to the new article page
            if ($results === false){
                echo mysqli_stmt_error($stmt);
            } else {
                // it is more advisable to use absolute paths below than relative path
                header("Location: http://localhost/flight_booking-app/admin_page.php"); 
                exit;
            }
        }
    }
}

?>
