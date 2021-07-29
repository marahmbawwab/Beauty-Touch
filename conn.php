<?php 
$db_name="marah" ;
$username="root" ;
$password="" ;
$servername="localhost" ;
$conn = mysqli_connect($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
 ?>