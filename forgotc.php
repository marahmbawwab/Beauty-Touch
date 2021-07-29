<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getuser();
}

function  editpass(){
global $conn ;
$name = $_POST["usern"];
$pass =  md5($_POST["pass"]);
$mysql_q = "UPDATE customer  SET pass='$pass' where usern ='$name'";
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
$temp = array("change successfully");
echo json_encode($temp);
mysqli_close($conn);

}
function getuser() {
 global $conn ;
$name = $_POST["usern"];
$mysql = "SELECT usern ,pass from customer where usern ='$name'" ;
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
