<?php require_once 'demo.php'; ?>
<?php require_once 'fnneed.php'; ?>
<?php 
	if(chkLogin()){
        header("Location: index.php");
    }

 ?>
 <?php
 			if(isset($_POST['login']))
 			{
 				
 				$email=$_POST['email'];
 				$lpass=$_POST['pass'];
 				
 				$cri=array("email"=>$email);
 				$qry=$collection->findOne($cri);

 					if(empty($qry))
 					{
						?>
 						<script type="text/javascript">
						alert("Email ID is not Registered.");	
						</script>
						<?php
						header('refresh:0.3; url= index.php#login');
            			//echo "Either <a href='register1.php'>Register</a> with the new Email ID or <a href='logina.php'>Login</a> with an already registered ID";


 					}
 					else{

 							$pass=$qry['pass'];
 							if(password_verify($lpass,$pass))
							{
 									$var=setsess($email);
									?>
										<script type="text/javascript">
										alert("You are Logged in.");	
										</script>
									<?php
										header('refresh:0.3; url= index.php');
							
							}		
 							else
							{
 								?>
										<script type="text/javascript">
										alert("Check your Password.");	
										</script>
									<?php
										header('refresh:0.3; url= index.php');
 							}
 					}		
 			}
   ?>