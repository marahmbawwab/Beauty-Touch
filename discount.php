<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
edit();
}
function edit (){
global $conn ;
$name = $_POST["usern"];
$sname = $_POST["sname"];
$mysql = "SELECT points  from point where usern ='$name' and salonn ='$sname' " ;
$res = mysqli_query($conn,$mysql);
$num_rows = mysqli_num_rows($res);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {
   $tmp =(int)$row["points"];
  }
  $newpoint= strval($tmp + 20) ;
$mysql_q = "UPDATE point SET points='$newpoint' WHERE usern ='$name' and salonn ='$sname'"; 
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
 $temp =array("result"=>$newpoint);
echo json_encode($temp);
mysqli_close($conn);
}
else {
	insrt();
}
}
insrt(){
	
$name = $_POST["usern"];
$sname = $_POST["sname"];
$mysql_q ="INSERT INTO point( usern, points ,salonn) VALUES ('$name','20','$sname')";
mysqli_query($conn,$mysql_q) or die (mysqli_error($conn));
$temp =array("result"=>"done successfully");
echo json_encode($temp);
mysqli_close($conn);	
}
?>




























