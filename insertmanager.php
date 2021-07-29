<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getsalon();
}

function create (){
global $conn ;
$name = $_POST["usern"];
$pass = md5($_POST["salonpassward"]);
$addres = $_POST["address"];
$email = $_POST["emailaddress"];
$phone= $_POST["salonphone"];
$feed = $_POST["saloninfo"];
$msg = "you are registered successfully";
$mysql_q ="INSERT INTO salonmanger ( username, salonaddress , phone , email , feedback , passward ) VALUES ('$name','$addres','$phone','$email','$feed','$pass')";
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
$temp = array($msg);
	//	 $temp =array(
 //'sendmsg'=>$msg
// );
  //pushing the array inside the hero array 
 //array_push($webchrz, $temp);
//displaying the data in json format 
echo json_encode($temp);
mysqli_close($conn);

}
function getsalon () {
 global $conn ;
$name = $_POST["usern"];
$mysql = "SELECT username from salonmanger where  username ='$name'";
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res); 
$res_s ="you are already registered" ;
	if ($num_rows == 0 ){
		create () ;
	}
	else {
		 $temp = array( $res_s);
//'sendmsg'=>$res_s
 
  //pushing the array inside the hero array 
// array_push($webchrz, $temp);
//displaying the data in json format 
echo json_encode($temp);
        mysqli_close($conn);
	}
}

 

?>