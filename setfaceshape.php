<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
edit();
}
function edit (){
global $conn ;
$name = $_POST["usern"];
$shape = $_POST["fshape"];
$mysql_q = "UPDATE customer  SET faceshape='$shape' WHERE usern='$name'"; 
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
 $temp =array("faceshape updated successfully ");
echo json_encode($temp);
mysqli_close($conn);
}

?>




























