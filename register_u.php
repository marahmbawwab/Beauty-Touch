<?php 

 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require "conn.php" ;

$name= $_POST["username"];
$pass = $_POST["password"];
$fn = $_POST["fn"];
$ln = $_POST["ln"];
$email = $_POST["email"];
$bd = $_POST["bd"];
$phone = $_POST["phone"];
$hashed_password = md5($pass);
$mysql_q = "insert into customer (birth, email, firstname ,lastname ,pass ,phone,usern) values ('$bd','$email','$fn','$ln','$hashed_password','$phone','$name') ";

if($conn->query($mysql_q) === TRUE){
	$msg= array("register successful");
	
	 echo json_encode($msg);
}
else{
	
	$msg= array("register not success");
	
	 echo json_encode($msg);
	
}
$conn->close();
 }
?>