<?php 

 
require "conn.php" ;
$name =  $_POST["username"];
$mysql = "SELECT * from customer  where usern ='$name' " ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res);
	if ($num_rows == 0 ){
			 $temp = array("you are not registerd ");
         echo json_encode($temp);
        mysqli_close($conn);
	}
	else {
      


$name = $_POST["username"];
$pass = $_POST["password"];
$hashed_password = md5($pass);
$mysql_q = "SELECT * from user  where usern ='$name' and pass ='$hashed_password' ";
$result = mysqli_query($conn,$mysql_q) ;
$num_rows = mysqli_num_rows($result);
if ($num_rows == 0){
	$temp = array("error passward");
         echo json_encode($temp);
}
else {
	  $temp = array("sign in successfully");
         echo json_encode($temp);
}
mysqli_close($conn);
	}


?>