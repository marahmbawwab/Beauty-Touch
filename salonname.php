<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
getsalon();
}
function getsalon () {
global $conn ;
$mysql = "SELECT username from salonmanger " ;
$res = mysqli_query($conn,$mysql);
//$num_rows = mysqli_num_rows($res);
	if (mysqli_num_rows($res) > 0) {
    // output data of each row
	$abc ="" ;
    while($row = mysqli_fetch_assoc($res)) {
    $abc=$abc.$row['username']."bb";
	}
	$final = array("result"=>$abc);
//echo json_encode(array("result"=>$result));
echo json_encode($final);
    //    $temp = array(
// 'name'=>$row["username"]
// );
 //pushing the array inside the outarray
// array_push($out, $temp);    
mysqli_close($conn);
}
}
?>