<?php
	require 'demo.php';
	require 'fnneed.php';

	if(isadmin())
	{

		?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>DietBook</title>
			</head>
			<body>
				<form action="add-blog-ac.php" method="post" enctype="multipart/form-data">
    <div><label for="Title">Title</label>
        <input type="text" name="title" id="title" />
    </div>
    <div><label for="Image">Image</label>
        <input type="file" name="img" id="img" required="required"/>
    </div>

    <label for="content">Content</label>

    <p><textarea name="content" id="content" cols="40" rows="8" class="span10"></textarea></p>

    <div class="submit"><input type="submit" name="btn_submit" value="Save"/></div>
</form>
			
			</body>
			</html>
		<?php

	}
	else{
		?>
			<script type="text/javascript">
						alert("you are not admin u r trying to access an unauthorized webpage");	
			</script>
			<?php
			header('refresh:0.3,url=index.php');

	}
  ?>