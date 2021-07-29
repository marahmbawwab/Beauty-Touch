<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
showuser();
}
function showuser () {
 global $conn ;
$name = $_POST["usern"];
$mysql = "SELECT * from customer where usern ='$name'" ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res); 
	if ($num_rows == 0 ){
		
//	$temp = [
 //'username'=>"you",
 //'passward'=>"are",
 //'birth'=>"not",
// 'phone'=>"reg",
 //'email'=>"there is ",
 //'last'=>"error"
// 'first'=>"error"
 //];
 echo json_encode($temp);
 mysqli_close($conn);
	}
	else {
$row = mysqli_fetch_assoc($res);
$temp =['username'=>$row["usern"],
 'passward'=>$row["pass"],
 'birth'=>$row["birth"],
 'phone'=>$row["phone"],
 'email'=>$row["email"],
 'last'=>$row["lastname"],
 'first'=>$row["firstname"]];
  echo json_encode($temp);
  mysqli_close($conn);
}
}
?>




























