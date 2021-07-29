<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getuser();
}

function getuser () {
 global $conn ;
$name = $_POST["salonn"];
$mysql = "SELECT photo from image" ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res);
$tmparray = array(); 
	if ($num_rows == 0 ){
		 $temp = array($name);
         echo json_encode($temp);
        mysqli_close($conn);
	}
	else {
       $row = mysqli_fetch_assoc($res);
	   $name =$row["data"];
       $temp =array($name);
         echo json_encode($temp);
        mysqli_close($conn);
	}
}
?>




























