<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
get();
}
function get(){
global $conn ;
$name = $_POST["user"];
$mysql_q = "SELECT image from salonmanger where username ='$name'" ; 
$result = mysqli_query($conn, $mysql_q);
$tmp = "" ;
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result) ;
   $tmp = ['imm'=>$row["image"] ] ;
echo json_encode($tmp);
mysqli_close($conn);
}
}
?>