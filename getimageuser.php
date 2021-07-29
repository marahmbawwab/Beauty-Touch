<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
get();
}
function get(){
global $conn ;
$name = $_POST["usern"];
$mysql_q = "SELECT image from customer where usern ='$name'" ; 
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