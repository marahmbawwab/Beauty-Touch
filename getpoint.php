<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
get();
}
function get(){
global $conn ;
$name = $_POST["shape"];
$mysql =  "SELECT * from $name" ; 
$res = mysqli_query($conn,$mysql);
if (mysqli_num_rows($res) > 0) {
   $abc ="" ;
while($row = mysqli_fetch_assoc($res)) {
$abc=$abc.$row["name"]."\t".$row["points"]."bb";
	}
	$final = array("result"=>$abc);
echo json_encode($final); 
}
mysqli_close($conn);
}
?>