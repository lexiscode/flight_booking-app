<?php

/**
 * Gets the database connection
 * 
 * @return object Connection to a MySQL server
 */

// CONNECTING TO THE DATABASE AND CHECKING FOR ERRORS
function connectDB(){

    $db_host = "localhost";
    $db_name = "flight_booking";
    $db_user = "lexiscode";
    $db_passwd = "lj.qztk-Kn7Awl6S";

    $conn = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);

    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }

    return $conn;
}
