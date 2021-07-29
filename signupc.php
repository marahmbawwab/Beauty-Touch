<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getuser();
}

function create (){
global $conn ;
$name = $_POST["usern"];
$pass = md5($_POST["pass"]);
$email = $_POST["emailaddress"];
$phone= $_POST["userphone"];
$birth=$_POST["date"];
$first=$_POST["fname"];
$last=$_POST["lname"];
$msg = "you are registered successfully";
$mysql_q ="INSERT INTO customer ( usern, firstname , lastname , phone , email , birth,pass ) VALUES ('$name','$first','$last','$phone','$email','$birth','$pass')";
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
$temp = array($msg);
echo json_encode($temp);
mysqli_close($conn);

}
function getuser() {
 global $conn ;
$name = $_POST["usern"];
$mysql = "SELECT usern from customer where  usern ='$name'";
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res); 
$res_s ="you are already registered" ;
	if ($num_rows == 0 ){
		create () ;
	}
	else {
		 $temp = array( $res_s);
echo json_encode($temp);
        mysqli_close($conn);
	}
}

 

?>