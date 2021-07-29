<?php

require "conn.php" ;
$res = array();
$name=$_POST["salon"];
$sql_query = "Select * from rate where salonname='$name'";
$result = mysqli_query($conn,$sql_query);
   
   if(mysqli_num_rows($result)>0){
	    $res['success']=1;
	   $rates= array();
	   
	   while($row = mysqli_fetch_assoc($result)){
		   array_push($rates,$row);
		   
	   }
	    $res['rates'] = $rates;
   }

  else{
	  
  $res['success']=0;
  $res['msg']= 'no data found';
  }
echo json_encode($res);
   mysqli_close($conn);

?>
