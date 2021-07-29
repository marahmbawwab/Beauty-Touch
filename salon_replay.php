<?php 

 

 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require "conn.php" ;
$name= $_POST["salonname"];
$un = $_POST["username"];
$umsg = $_POST["umsg"];
$replay = $_POST["replay"];
$time = $_POST["time"];

$mysql_q = "insert into s_u_msg (salonname, username, umsg,replay,time) values ('$name','$un','$umsg','$replay','$time')";
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