<?php

require 'conn.php' ;
$res = array();
$sql_query = "Select * from salonmanger";
$result = mysqli_query($conn,$sql_query);
   
   if(mysqli_num_rows($result)>0){
	    $res['success']=1;
	   $rates= array();
	   
	   while($row = mysqli_fetch_assoc($result)){
		   array_push($rates,$row);
		   
	   }
	    $res['salon'] = $rates;
   }

  else{
	  
  $res['success']=0;
  $res['msg']= 'there is no salons';
  }
echo json_encode($res);
 //echo json_encode($rates);
   mysqli_close($conn);


?>
