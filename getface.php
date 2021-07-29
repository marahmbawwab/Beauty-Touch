<?php 
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
require 'conn.php' ;
get();
}
function get(){
global $conn ;
$name = $_POST["usern"];
$mysql_q =  "SELECT faceshape from customer where usern ='$name'" ; 
$result = mysqli_query($conn, $mysql_q);
$tmp = "" ;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
   $tmp =$tmp.$row["faceshape"];
  }
}
echo json_encode($tmp);
mysqli_close($conn);
}

?>
