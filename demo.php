<?php
   // connect to mongodb
   try{
   $m = new MongoClient();
   //echo "Succesfully Connected";
	
  
   // select a database
   $db = $m->dietbook;
   $collection=$db->userdata;
   $collection2=$db->blogs;
   $col=$db->graphdata;
   
   $bfs=$db->breakfasts;
   $din=$db->dinner;
   $bjj=$db->bhaji;
   //$collection3=$db->admina;
}
	catch(Exception $e)
	{
		echo "oops can't connect to the server";
	}
   
	
?>