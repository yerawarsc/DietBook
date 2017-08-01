<!DOCTYPE html>
<html>
<title>Blogs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<!---BS FILES-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!---->


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
<body>
<!-- #f44336 -->

<nav style="background-color: orange ">
    <div class="nav-wrapper">
      <a href="homee.php" class="brand-logo">DietBlogs</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        
        <li><a href="index.php">Home</a></li>
      </ul>
    </div>
  </nav>




<div class="w3-container">

<?php
	require 'demo.php';
	require 'fnneed.php';

	$cursor=$collection2->find();
	$grid=$db->getGridFS();
?>


<div clas="row col-sm-6">

  <?php
  	foreach ($cursor as $doc)
  	{
  		$info1=$doc['title'];
  		$info2=$doc['imageid'];
  		$info3=$doc['content'];
  		$info4=$doc['filetype'];
  		$image =$grid->findOne(array('_id'=>new MongoID($info2)))->getBytes();
  		$im=base64_encode($image);
  		?>
  		  			
    
  <div class="col-sm-6 w3-padding-large">
    <div class="w3-card-4 w3-border w3-orange w3-padding-small w3-round-large" style="width:100% min-height:100%">
      <center><p style="font-size:40px " ><?php echo $info1; ?></p></center>
      <img class="img-responsive w3-round-large" src= "data:<?php echo $info4 ?>;base64,<?php echo $im ?>" style="width:100% ">
        <p><br><?php echo $info3 ?></p>
    </div>
  </div>
</div>	
	

      			
<?php
	}
	?>

	
	</div>
	
</body>
</html>
