<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>

<?php
	
	
	include 'fnneed.php';
	include 'demo.php';
	
	
	$bfast1=$bfast2=$bfast3=$snack1=$snack2=$snack3=$sabzi1=$sabzi2="";
	$salat1=$salat2="no";
	$roti2=$rice2=$roti1=$rice1=0;
	$cal=0;
	
	

		
		$bfast1 = $_POST["bfast1"];
		$bfast2 = $_POST["bfast2"];
		$bfast3 = $_POST["bfast3"];
		$roti1 = $_POST["roti1"];
		$rice1 = $_POST["rice1"];
		$snack1 = $_POST["snack1"];
		$snack2 = $_POST["snack2"];
		$snack3 = $_POST["snack3"];
		$roti2 = $_POST["roti2"];
		$rice2 = $_POST["rice2"];
		$var1=false;
		if(isset($_POST["salat1"]))
			$var1=true;
		if($var1)
			$salat1 = 1;
		$var2=false;
		if(isset($_POST["salat2"]))
			$var2=true;
		if($var2)
			$salat2 = 1;
		$sabzi1 = $_POST["sabzi1"];
		$sabzi2 = $_POST["sabzi2"];

	$roti=$roti1+$roti2;
	$rice=$rice1+$rice2;

	$salat=0;
	if($salat1==1)
		$salat++;
	if($salat2==1)
		$salat++;
	

	if($bfast1=="null")
		{
		$cal+=0;
	}
	else{
	$que1=array('bname' => $bfast1);
	$cursor=$bfs->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["bcal"];
	}
	}
	
	if($bfast2=="null")
		{
		$cal+=0;
	}
	else{
	$que1=array('bname' => $bfast2);
	$cursor=$bfs->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["bcal"];
	}
	}
	
	if($bfast3=="null")
		{
		$cal+=0;
	}
	else{
	$que1=array('bname' => $bfast3);
	$cursor=$bfs->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["bcal"];
	}
	}
	
	
	
	
	$que1=array('dname' => "roti");
	$cursor=$din->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["dcal"]*$roti;
	}

	$que1=array('dname' => "rice");
	$cursor=$din->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["dcal"]*($rice);
	}		

	
	if($snack1=="null")
	{
		$cal+=0;
	}else{
	$que1=array('bname' => $snack1 );
	$cursor=$bfs->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["bcal"];
	}		
	}
	
	if($snack2=="null")
	{
		$cal+=0;
	}else{
	$que1=array('bname' => $snack2 );
	$cursor=$bfs->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["bcal"];
	}		
	}
	
	if($snack3=="null")
	{
		$cal+=0;
	}else{
	$que1=array('bname' => $snack3 );
	$cursor=$bfs->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["bcal"];
	}		
	}
	
	$cal+= $salat*100;
	
	
	if($sabzi1=="null"){
		$cal+=0;
	}else{
	$que1=array('bname' => $sabzi1 );
	$cursor=$bjj->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["bcal"];
	}
	}
	
	
	if($sabzi2=="null"){
		$cal+=0;
	}else{
	$que1=array('bname' => $sabzi2 );
	$cursor=$bjj->find($que1);
	foreach ($cursor as $doc) 
	{
		$cal+= $doc["bcal"];
	}
	}
	
	
	
	
	$rec=reqcal();
	
	
	$mistake=round(abs($rec-$cal)/$rec*100);

		
?>	
<div class="modal fade"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;"></div>
        <div class="modal-body" style="padding:40px 50px;">
		<strong><center> <?php echo "Hello ".getname();?></strong></center>
        <?php if(bmn()<18.9) {?>
			<center><h3>You are Underweight.<br> 
		<?php }elseif(bmn()>24.5){ ?>
			<center><h3>You are Overweight.<br>
		<?php }else{ ?>	
			<center><h3>You are Healthy.<br>
		<?php } ?>
		<?php if(abs($rec-$cal)<75){ ?>
			Your diet is healthy for you.<br>Your mistake value is <?php echo $mistake; ?> out of 100.</h3></center>
		<?php } elseif(round($rec-$cal)>=75){?>
			You have eaten less than your need.<br>Your diet is unhealthy for you.<br>You need to eat more.<br>Your mistake value is <?php echo $mistake; ?> out of 100.</h3></center>
		<?php }else{?>
			You have eaten more than your need.<br>Your diet is unhealthy for you.<br>You need to eat less.<br>Your mistake value is <?php echo $mistake; ?> out of 100.</h3></center>
		<?php }
			?>		
			
			<center><button onclick="location.href = 'index.php';"  class="float-left submit-button" >Home</button></center>
			
<?php $m=new MongoClient();
		$db = $m->dietbook;
   		$col=$db->graphdata;

   		$array=array(
 		"email" => $_SESSION['email'],
 		"mistake" => $mistake,
 	 	"date" => date("d-m-Y")
   		);

   		$col->insert($array);

   		?>

        </div>       
      </div>      
    </div>
  </div>	
</body>




