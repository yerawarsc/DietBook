<?php
	require 'demo.php';
	require 'fnneed.php';

	if(isset($_POST['savech']))
	{
			$gender=$_POST['gen'];
			$age=$_POST['age'];
			$wei=$_POST['wt'];
			$hei=$_POST['ht'];
			$acti=$_POST['activity'];

			$array=array(

					"gender" => $gender,
					"age" => $age,
					"weight" => $wei,
					"height" => $hei,
					"activity"=> $acti
				);

			$var=$collection->update(array('email'=>$_SESSION['email']),array('$set'=>$array));
			if($var)
			{
				?>
					<script type="text/javascript">
						
						alert("Changes Saved Successfully");
						
					</script>
				<?php
					header('refresh:0.3,url = index.php');


			}
			else
			{
					?>
					<script type="text/javascript">
						
						alert("Oops Something went wrong");

					</script>
				<?php



			}






	}




  ?>