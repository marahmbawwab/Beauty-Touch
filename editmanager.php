<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getuser();
}

function edit (){
global $conn ;
$name = $_POST["usern"];
$pass = md5($_POST["salonpassward"]);
$addres = $_POST["address"];
$email = $_POST["emailaddress"];
$phone= $_POST["salonphone"];
$feed = $_POST["saloninfo"];
$mysql_q = "UPDATE salonmanger  SET passward='$pass' ,salonaddress ='$addres' ,phone ='$phone', email ='$email' , feedback ='$feed' WHERE username='$name'"; 
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
//$mysql = "SELECT * from salonmanger where username ='$name'" ;
//$res = mysqli_query($conn,$mysql);
//$row = mysqli_fetch_assoc($res);
// $temp = [
 //'username'=>$row["username"],
// 'passward'=>$row["passward"],
// 'address'=>$row["salonaddress"],
 //'phone'=>$row["phone"],
 //'email'=>$row["email"],
// 'feed'=>$row["feedback"]
 // ];
 $temp =array("data updated successfully ");
echo json_encode($temp);
mysqli_close($conn);
}

function getuser () {
 global $conn ;
$name = $_POST["usern"];
$mysql = "SELECT username  from salonmanger where username ='$name'" ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res);
$tmparray = array(); 
	if ($num_rows == 0 ){
		 $temp = array("you are not registerd");
         echo json_encode($temp);
        mysqli_close($conn);
	}
	else {
        edit();
	}
}
?>




























