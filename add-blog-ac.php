<?php
	require 'demo.php';
	require 'fnneed.php';
?>
<?php
	if(isset($_POST['btn_submit']))
	{
		//$img=$_POST['img'];
		$title=$_POST['title'];
		$content=$_POST['content'];
		$grid=$db->getGridFS();
		$filetype = $_FILES['img']['type'];
		
		
        
	 if(empty($_FILES['img']['name']))
	 {
	 	$insert = array(
			     "title"=>$title,
				"filetype"=>"",
				"imageid"=>"",
				"content"=>$content
				);

	 }
	 else
	 {
	 		$filetype = $_FILES['img']['type'];
			$imageid = $grid->storeUpload('img');
			$insert = array(
				"title"=>$title,
				"filetype"=>$filetype,
				"imageid"=>$imageid,
				"content"=>$content,
				);
		}
		$var2=$collection2->insert($insert);
		if($var2)
		{
				?>
					<script type="text/javascript">
						alert('blog saved succesfully');
					</script>
					<?php
					header('refresh:0.1,url=show-blog.php');
		}
		else{
				?>
					<script type="text/javascript">
						alert('Their might be some problem');
					</script>
					<?php

		}





}






  ?>