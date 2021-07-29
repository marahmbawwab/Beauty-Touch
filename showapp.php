<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getappoints();
}
function getappoints(){
global $conn ;
$salonname= $_POST["sname"];
$appdate = $_POST["adate"];
$timen= strtotime($appdate); //convert astring to date
$newfor = date('y-m-d',$timen);
$mysql = "SELECT * from appoint where salonname ='$salonname' and dateappoint= '$newfor'" ;
$res = mysqli_query($conn,$mysql);
if (mysqli_num_rows($res) > 0) {
   $abc ="" ;
while($row = mysqli_fetch_assoc($res)) {
$abc=$abc.$row['username']."\t".$row['salonname']."\t".$row['dateappoint']."\t".$row['timeappoint']."\n";
	}
	$final = array("result"=>$abc);
echo json_encode($final); 
//mysqli_close($conn);
}
else {
$final = array("result"=>"there is no appointment to show in that day");
echo json_encode($final);	
}
mysqli_close($conn);
}
?>