<?php
	require 'fnneed.php';
	require 'demo.php';
#if (chkLogin()) {
#	header("Location :homee.php");
#}
#?>
<?php
	if (isset($_POST['subpro'])) {

		$sex=$_POST['gender'];
		$stat=0;
		$age=$_POST['age'];
		$weight=$_POST['weight'];
		$height=$_POST['height'];
		$activity=$_POST['activity'];

		$array=array(
				"gender" => $sex,
				"age" => $age,
				"weight" => $weight,
				"height" => $height,
				"status" =>$stat,
				"activity" =>$activity
				);

		$var=$collection->findAndModify(array("email" => $_SESSION['email']),array('$set' => $array));
		if($var&&$stat==0)
		{
			$retval=$collection->findAndModify(array("email" => $_SESSION['email']),array('$set' => array("status" => 1)));
			?>
			<script type="text/javascript">
						alert("Information Successfully saved");
			</script>
			<?php
			header('refresh:0.3; url= index.php');
		}
		else
		{
			?>	
			<script type="text/javascript">
						alert("Error Occured try again");	
					</script>
			<?php
			header('refresh:0.3; url= index.php');
	}

		
	}



?>

