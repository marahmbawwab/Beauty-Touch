<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getappoints();
}
function getappoints(){
global $conn ;
$salonname= $_POST["salonn"];
$mysql = "SELECT * from appoint where salonname ='$salonname'" ;
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
$final = array("result"=>"there is no appointment to show ");
echo json_encode($final);	
}
mysqli_close($conn);
}
?>