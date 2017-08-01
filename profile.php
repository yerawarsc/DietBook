<?php
	require 'demo.php';
	require 'fnneed.php';
	$stat1= $collection->findOne(array('Email id'=> $_SESSION['email']), array("status"));
	//echo $stat1['status'];
	$var1=$stat1['status'];
    if(statchk($var1)){
    	//	echo "Hello";
    	header('refresh: 0.1, url = myprofile.php');
    }
    //echo "$var2";
?>
<!DOCTYPE html>
<html>
<head>
	<title>DietBook</title>
</head>
<body>

<form action="profile-ac.php" method="POST">
	Sex:<input type="radio" name="gender" value="male">Male<br>
		<input type="radio" name="gender" value="female">Female<br>
			
	Age:<input type="number" name="age"><br>
	Weight:<input type="number" name="weight"><br>
	Height:<input type="number" name="height"><br>
	Exercise: <select name="activity">
						<option value="vhigh">Very High</option>
						<option value="high">High</option>
						<option value="med">Moderate</option>
						<option value="low">Low</option>
						<option value="vlow">Very Low</option>
					</select>
	<button type="submit" class="btn btn-default" name="subpro">Submit</button>


</form>


</body>
</html>

