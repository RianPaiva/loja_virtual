<?php
$servername = "localhost";
$database = "bd_lavechia_store";
$username = "root";
$password = "";
 
// Create connection
 
$conn = mysqli_connect($servername, $username, $password, $database);
 
// Check connection
 
if (!$conn) {
 
    die("Connection failed: " . mysqli_connect_error());
 
}



?>