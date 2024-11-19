<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud";

    // Create connection 
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if($conn->connect_error){
        die("Connection error: {$conn->connect_error}");
    }
?>