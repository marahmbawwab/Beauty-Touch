<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getuser();
}

function  editpass(){
global $conn ;
$name = $_POST["usern"];
$pass =  md5($_POST["pass"]);
$mysql_q = "UPDATE salonmanger  SET passward='$pass' where username ='$name'";
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
$temp = array("change successfully");
echo json_encode($temp);
mysqli_close($conn);

}
function getuser() {
 global $conn ;
$name = $_POST["usern"];
$mysql = "SELECT username ,passward from salonmanger where username ='$name'" ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res);
	if ( $num_rows == 0 ){
	$temp = array("you are not registered");
     echo json_encode($temp);
        mysqli_close($conn);
	}
	else {
        editpass();
	}
}


?>






