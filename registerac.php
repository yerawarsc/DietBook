<?php require 'demo.php';?>
<?php require  'fnneed.php';?>
<?php  
 if(isset($_POST['regup']))
 {
 	

 	$fname = $_POST['fname'];
 	$lname = $_POST['lname'];
 	$email = $_POST['email'];
 	$mno = $_POST['mno'];
 	$temp  = $_POST['pass'];
 	$options =array('cost'=>10);
 	$pass= password_hash($temp, PASSWORD_BCRYPT, $options);
 	$stat=0;
 	


 	$array=array(
 		"fname" => $fname,
 		"lname" => $lname,
 		"email" => $email,
 		"mno" => $mno,
 	 	"pass" => $pass,
 	 	"status" => $stat
   );
 	$qry=chckmail($email);
 	if($qry)
 	{
 			register($array);
 	?>
		<script type="text/javascript">
					alert("You are Registered.");	
				</script>
			<?php
				header('refresh:0.3; url= index.php');
 		}
 	else
 		{
 			?>
		<script type="text/javascript">
					alert("Email is already used.");	
				</script>
			<?php
				header('refresh:0.3; url= index.php');


 		}
 		




 }



 ?>