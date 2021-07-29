<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getuser();
}
function sign (){
global $conn ;
$name = $_POST["username"];
$pass = md5($_POST["password"]);
$mysql_q = "SELECT * from customer  where usern ='$name' and pass ='$pass' ";
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
$name = $_POST["username"];
$mysql = "SELECT * from customer  where usern ='$name' " ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res);
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