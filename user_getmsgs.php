<?php

require "conn.php" ;
$name= $_POST["username"];
$res = array();
$sql_query = "Select * from s_u_msg where username ='$name'  ";
$result = mysqli_query($conn,$sql_query);
   
   if(mysqli_num_rows($result)>0){
	    $res['success']=1;
	   $rates= array();
	   
	   while($row = mysqli_fetch_assoc($result)){
		   array_push($rates,$row);
		   
	   }
	    $res['msgs'] = $rates;
   }

  else{
	  
  $res['success']=0;
  $res['msg']= 'no data found';
  }
echo json_encode($res);
 //echo json_encode($rates);
   mysqli_close($conn);


?>
