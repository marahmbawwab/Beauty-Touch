<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST"){
require "conn.php" ;
$name= $_POST["salonname"];
$rate = $_POST["rate"];
$msg = $_POST["msg"];
$uname = $_POST["uname"];

$mysql_q = "insert into rate (feedback, ratestar, salonname,username) values ('$msg','$rate','$name','$uname')";
if($conn->query($mysql_q) === TRUE){
	$msg= array("rating successful");
	 echo json_encode($msg);
}
else{
	$msg= array("rating not success");
	echo json_encode($msg);
	
}
$conn->close();
 }
?>