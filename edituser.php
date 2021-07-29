<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getuser();
}

function edit(){
global $conn ;
$name = $_POST["usern"];
$pass = md5($_POST["pass"]);
$birth = $_POST["date"];
$email = $_POST["mail"];
$lname= $_POST["last"];
$fname = $_POST["first"];
$num = $_POST["phone"];
$mysql_q = "UPDATE customer  SET pass='$pass' ,birth='$birth' ,phone ='$num', firstname='$fname' , lastname ='$lname' ,email ='$email' WHERE usern='$name'"; 
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
 $temp =array("data updated successfully ");
echo json_encode($temp);
mysqli_close($conn);
}
function getuser () {
 global $conn ;
$name = $_POST["usern"];
$mysql = "SELECT usern from customer where usern ='$name'" ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res);
$tmparray = array(); 
	if ($num_rows == 0 ){
		 $temp = array("you are  registerd");
         echo json_encode($temp);
        mysqli_close($conn);
	}
	else {
        edit();
	}
}
?>




























