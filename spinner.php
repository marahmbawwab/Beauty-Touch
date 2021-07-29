<?php

require "conn.php" ;
$response = array();
$sql_query = "Select username from salonmanger";
$result = mysqli_query($conn,$sql_query);
   
   if(mysqli_num_rows($result)>0){
	    $response['success']=1;
	   $salons= array();
	   
	   while($row = mysqli_fetch_assoc($result)){
		   array_push($salons,$row);
		   
	   }
	    $response['salons'] = $salons;
   }

  else{
	  
  $response['success']=0;
  $response['msg']= 'no data found';
  }
 echo json_encode($response);
   mysqli_close($conn);


?>