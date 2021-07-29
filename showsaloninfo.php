<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
showuser();
}

function showuser () {
 global $conn ;
$name = $_POST["salonn"];
$mysql = "SELECT * from salonmanger where username ='$name'" ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res); 
	if ($num_rows == 0 ){
		 $temp = [
 'username'=>"you",
 'passward'=>"are",
 'address'=>"not",
 'phone'=>"reg",
 'email'=>"there is ",
 'feed'=>"error"
 ];
 echo json_encode($temp);
        mysqli_close($conn);
	}
	else {
$row = mysqli_fetch_assoc($res);
 $temp = [
 'sname'=>$row["username"],
 'address'=>$row["salonaddress"],
 'phone'=>$row["phone"],
 'email'=>$row["email"],
 'feed'=>$row["feedback"]
 ];
echo json_encode($temp);
mysqli_close($conn);
}
}
?>




























