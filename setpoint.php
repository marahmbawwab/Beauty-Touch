<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
edit();
}
function edit (){
global $conn ;
$name = $_POST["shape"];
$haircut = $_POST["hair"];
$mysql = "SELECT points  from $name where name ='$haircut'" ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {
   $tmp =(int)$row["points"];
  }
}
$newpoint= strval($tmp + 10) ;
$mysql_q = "UPDATE $name  SET points='$newpoint' WHERE name='$haircut'"; 
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
 $temp =array("data updated successfully ");
echo json_encode($temp);
mysqli_close($conn);
}
?>




























