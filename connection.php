<?php 
$server = "localhost";
$username = "root";
$password = "test"; 

// Create connection 
$conn = new mysqli($server, $username, $password);

// check connection
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}
// echo "Connected succeessfully";

?>