<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
edit();
}
function edit (){
global $conn ;
$name = $_POST["user"];
$shape = $_POST["image"];
$mysql_q = "UPDATE salonmanger SET image='$shape' WHERE username='$name'"; 
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
 $temp =array("image updated successfully ");
echo json_encode($temp);
mysqli_close($conn);
}

?>




























