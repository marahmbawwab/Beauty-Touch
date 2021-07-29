<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getapp();
}
function create (){
global $conn ;
$name = $_POST["name"];
$sname = $_POST["sname"];
$date= $_POST["adate"];
$time = $_POST["atime"];
$timen= strtotime($date);
$newformat = date('Y-m-d',$timen);
$msg = "your appointment done successfully";
$mysql_q ="INSERT INTO appoint ( username, salonname , dateappoint , timeappoint ) VALUES ('$name','$sname','$newformat','$time')";
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
$temp = array($msg);
echo json_encode($temp);
mysqli_close($conn);
}
function getapp () {
 global $conn ;
$date = $_POST["adate"];
$time =$_POST["atime"];
$currentTime =$time;
//$currentTime = (new DateTime($time))->modify('+1 day');
//$startTime = new DateTime('09:00');
//$endTime = (new DateTime('17:00'))->modify('+1 day');
//if (!($currentTime >= $startTime && $currentTime <= $endTime)) {
	//$rresult ="we are closed in that time please choose atime between 09:00 and 17:00" ;
    //$temp = array($rresult);
     // echo json_encode($temp);
	 // mysqli_close($conn);
//}
   create () ;
}
?>