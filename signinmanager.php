<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getuser();
}
function sign (){
global $conn ;
$name = $_POST["usern"];
$pass = md5($_POST["pass"]);
$mysql_q = "SELECT passward ,username from salonmanger where username ='$name' and passward ='$pass' ";
$result = mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
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
function getuser () {
 global $conn ;
$name = $_POST["usern"];
$mysql = "SELECT username from salonmanger where username ='$name'" ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res);
$tmparray = array(); 
	if ($num_rows == 0 ){
			 $temp = array("you are not registerd ");
         echo json_encode($temp);
        mysqli_close($conn);
	}
	else {
       sign();
	}
}
?>

