<?php 

 

 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require "conn.php" ;
$name= $_POST["salonname"];
$un = $_POST["username"];
$time = $_POST["time"];
$msg = $_POST["msg"];

$mysql_q = "insert into u_s_message (username, salonname, msg,time) values ('$un','$name','$msg','$time')";
if($conn->query($mysql_q) === TRUE){
	$msg= array("sending successful");
	 echo json_encode($msg);
}
else{
	$msg= array("sending not success");
	echo json_encode($msg);
	
}
$conn->close();
 }
?>