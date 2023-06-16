<?php

require "includes/db_connect.php";
require "includes/get_customer_data_id.php";

// connect to the database server
$conn = connectDB();


// READING or RETRIEVING from the database to get specific article post by their ids
if (isset($_GET['id'])){
    
    // Delete the data in the database server by its id row
    $sql = "DELETE FROM passengers_record WHERE id = ?";

    // Prepares an SQL statement for execution
    $stmt = mysqli_prepare($conn, $sql);

    // Bind variables for the parameter markers in the SQL statement prepared
    mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);

    // Executes a prepared statement
    $result = mysqli_stmt_execute($stmt);

    if($result){
        // it is more advisable to use absolute paths below than relative path
        header("Location: http://localhost/flight_booking-app/admin_page.php"); 
        exit;
    }

    /* Check if the deletion was successful
    if (mysqli_affected_rows($conn) > 0) {
        echo "Data deleted successfully.";
    } else {
        echo "No data found or deletion failed.";
    }
    */
} else{
    echo "Invalid delete action. Page not found.";
}



// checks if the article's id exits in the database, then returns an associative array
$data = getCustomerData($conn, $_GET['id']); 

if ($data){
    // Get array values from its keys, which is used in the HTML form below
    $id = $data['id'];
} else {
    echo "No data found from such ID to be deleted.";
}

?>
