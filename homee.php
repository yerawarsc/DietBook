<?php
    require 'fnneed.php';
	echo "in home";
	echo $_SESSION['email'];
	/*?>
		<a href="logout.php">logout</a>
	<?php*/
	if(chkLogin())
	{ 
		
		if(isadmin())
		{
			?>
			<a href="add-blog.php">Add Blog</a>
			<?php
		}
		?>
		<a href="profile.php">profile</a>
		<a href="logout.php">logout</a>
		<a href="dailymeal.html">Dailymeal</a>
		<?php
    }

 ?>