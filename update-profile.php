<?php
	require 'demo.php';
	require 'fnneed.php';

	$cursor=$collection->find(array('email'=>$_SESSION['email']),array('fname','lname','email','mno','gender','age','weight','height','activity'));
	foreach ($cursor as $document) {
		$fname=$document['fname'];
		$lname=$document['lname'];
		$email=$document['email'];
		$mno=$document['mno'];
		$height=$document['height'];
		$weight=$document['weight'];
		$age=$document['age'];
		$gender=$document['gender'];
		$activity=$document['activity'];
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title>DietBook</title>
</head>
<body>

<form action="up-pro-ac.php" method="POST">
	First Name: <?php echo $fname ?>
	Last Name: <?php echo $lname ?>
	Email id: <?php echo $email ?>
	Mobiler number: <?php echo $mno ?>
	Weight:<input type="text" name="wt" value=<?php echo $weight ?>><br>
	Height:<input type="text" name="ht" value=<?php echo $height ?>><br>
	Age:<input type="text" name="age" value=<?php echo $age ?>><br>
	Gender:<input type="text" name="gen" value=<?php echo $gender ?>><br>
	Exercise: <select name="activity">
						<option value="vhigh">Very High</option>
						<option value="high">High</option>
						<option value="med">Moderate</option>
						<option value="low">Low</option>
						<option value="vlow">Very Low</option>
					</select>
	
	<button type="submit" name="savech">Save changes</button>
	






</form>





</body>
</html>
