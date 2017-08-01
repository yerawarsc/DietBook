<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DietBook</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
</head>

<body>
<?php   
    require 'demo.php';
    require 'fnneed.php';
?>

    <!---------------------------------------------------------------- Navigation ---------------------------------------------------------------->
    
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <?php if(chkLogin()){?>
                <li class="sidebar-brand">
                    <a onclick=$("#menu-close").click() data-toggle="modal" data-target="#profile2"; ><?php echo "Hi ".getname(); ?></a>
                </li>
            <?php
            }else{?>
        
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click();>DietBook</a>
            </li>
            <?php 
            }?>
            <li>
                <a href="#top" onclick=$("#menu-close").click();>Home</a>
            </li>
            
            <?php if(chkLogin())
            {?>
            <li>
                <a href="#check" onclick=$("#menu-close").click();>Check Meal</a>
            </li>
            <?php
    
            if(isadmin())
            {
                ?>
                <li>
                <a href="add-blog.php" onclick=$("#menu-close").click(); >Add Blogs</a>
            </li>
            <?php } ?>
            <li>
                <a href="show-blog.php" onclick=$("#menu-close").click();>Read Blogs</a>
            </li>
            

            <?php
            require 'demo.php';
            //require 'fnneed.php';
            $stat1= $collection->findOne(array('email'=> $_SESSION['email']), array("status"));
            //echo $stat1['status'];
            $var1=$stat1['status'];
            if(statchk($var1)){
                //  echo "Hello";
              ?>           
              <li>
                <a  onclick=$("#menu-close").click();  data-toggle="modal" data-target="#profile2">Update Profile</a>
            </li>
           <?php 
            }

            else
            {
            ?>
              <li>
                <a  onclick=$("#menu-close").click();  data-toggle="modal" data-target="#update">Update Profile</a>
            </li>
            <?php
            }

        
            }else
            {?>
            <li>
                <a href="#login"  data-toggle="modal" data-target="#login" onclick=$("#menu-close").click();>Login</a>
            </li>
            <li>
                <a href="#register" data-toggle="modal" data-target="#register" onclick=$("#menu-close").click();>Register</a>
            </li>
            
            <?php 
            }?>
            
            
            
            
            <li>
                <a href="#aboutus" onclick=$("#menu-close").click();>About Us</a>
            </li>
            <?php if(chkLogin())
            {?>
            <li>
                <a href="logout.php" onclick=$("#menu-close").click();>Logout</a>
            </li>
            
            <?php
            }?>
            
        </ul>
    </nav>

    <!----------------------------------------------------------------- Header ---------------------------------------------------------------- -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <!-- <h1>DietBook</h1>
            <h3>Your Personal Dietician</h3>
            <br>
            <a href="#aboutus" class="btn btn-dark btn-lg">What??</a> -->
        </div>
    </header>
               
   <!------------------------------------------------------------------ About ------------------------------------------------------------------>
    <section id="aboutus" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>DietBook</h1>
                    <h3>Your Personal Dietician</h3>
                    
                    <p class="lead">Maintaining health is very important and it needs balanced diet. But no one is much aware about it. Also, no one is willing to pay dieticians for any suggestions. Thus, we are providing an easy accessible web based platform “DietBook”, which provides number of diet advices and also evaluates daily diet combinations. Here, one can read various diet related blogs on different topics which are written by expert dieticians.</p>
                </div>
            </div>
        </div>
    </section>

    <!--------------------------------------------------------------- Check Meal ---------------------------------------------------------------->

   
   <?php if(chkLogin()) {?>
            
    <section id="check" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Enter Details:</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="service-item">
                                <h4>
                                    <strong>Breakfast</strong>
                                </h4><br>
                        Item 1: <select class="form-control" id="bfast1" name="bfast1" style="max-width:100%">
                                    <option value="null">Nothing</option>
                                    <option value="poha">Poha</option>
                                    <option value="upith">Upitthh</option>
                                    <option value="idli">Idli</option>
                                    <option value="dosa">Dosa</option>
                                    <option value="shira">Shira</option>
                                    <option value="wadapaav">WadaPaav</option>
                                    <option value="pakora">Pakora</option>
                                    <option value="milk">Milk</option>
                                    <option value="samosa">Samosa</option>
                                    <option value="bread">Bread</option>
                                    <option value="banana">Banana</option>
                                    <option value="biscuits">Biscuits</option>
                                    <option value="egg">Eggs</option>
                                    <option value="tea">Tea</option>
                                    <option value="coffee">Coffee</option>
                                    <option value="apple">Apple</option>                                    
                                </select><br>
                        Item 2: <select class="form-control" id="bfast2" name="bfast2" style="max-width:100%">
                                    <option value="null">Nothing</option>
                                    <option value="poha">Poha</option>
                                    <option value="upith">Upitthh</option>
                                    <option value="idli">Idli</option>
                                    <option value="dosa">Dosa</option>
                                    <option value="shira">Shira</option>
                                    <option value="wadapaav">WadaPaav</option>
                                    <option value="pakora">Pakora</option>
                                    <option value="milk">Milk</option>
                                    <option value="samosa">Samosa</option>
                                    <option value="bread">Bread</option>
                                    <option value="banana">Banana</option>
                                    <option value="biscuits">Biscuits</option>
                                    <option value="egg">Eggs</option>
                                    <option value="tea">Tea</option>
                                    <option value="coffee">Coffee</option>
                                    <option value="apple">Apple</option>                                    
                                </select><br>
                        Item 3: <select class="form-control" id="bfast3" name="bfast3" style="max-width:100%">
                                    <option value="null">Nothing</option>
                                    <option value="poha">Poha</option>
                                    <option value="upith">Upitthh</option>
                                    <option value="idli">Idli</option>
                                    <option value="dosa">Dosa</option>
                                    <option value="shira">Shira</option>
                                    <option value="wadapaav">WadaPaav</option>
                                    <option value="pakora">Pakora</option>
                                    <option value="milk">Milk</option>
                                    <option value="samosa">Samosa</option>
                                    <option value="bread">Bread</option>
                                    <option value="banana">Banana</option>
                                    <option value="biscuits">Biscuits</option>
                                    <option value="egg">Eggs</option>
                                    <option value="tea">Tea</option>
                                    <option value="coffee">Coffee</option>
                                    <option value="apple">Apple</option>                                    
                                </select><br>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="service-item">
                                <h4>
                                    <strong>Lunch</strong>
                                </h4><br>
                        Roti:<input type="number" name="roti1" placeholder="count" ><br><br>
                        Rice:<input type="number" name="rice1" placeholder="small bowls" ><br><br>
                                
                                <label for="sel1">Along with:</label>
                                <select class="form-control" id="sabzi1" name="sabzi1" style="max-width:100%">
                                    <option value="null">Nothing</option>
                                    <option value="cereals">Cereals</option>
                                    <option value="greenv">Green Vegetables</option>
                                    <option value="eggc">Egg Curry</option>
                                    <option value="chickenc">Chicken Curry</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="yes" name="salat1">I had Salat</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="service-item">
                                <h4>
                                    <strong>Snacks</strong>
                                </h4><br>
                        Item 1: <select class="form-control" id="snack1" name="snack1" style="max-width:100%">
                                    <option value="null">Nothing</option>
                                    <option value="poha">Poha</option>
                                    <option value="upith">Upitthh</option>
                                    <option value="idli">Idli</option>
                                    <option value="dosa">Dosa</option>
                                    <option value="shira">Shira</option>
                                    <option value="wadapaav">WadaPaav</option>
                                    <option value="pakora">Pakora</option>
                                    <option value="milk">Milk</option>
                                    <option value="samosa">Samosa</option>
                                    <option value="bread">Bread</option>
                                    <option value="banana">Banana</option>
                                    <option value="biscuits">Biscuits</option>
                                    <option value="egg">Eggs</option>
                                    <option value="pizza">Pizza</option>
                                    <option value="burger">Burger</option>
                                    <option value="tea">Tea</option>
                                    <option value="coffee">Coffee</option>
                                    <option value="apple">Apple</option>                                    
                                </select><br>
                        Item 2: <select class="form-control" id="snack2" name="snack2" style="max-width:100%">
                                    <option value="null">Nothing</option>
                                    <option value="poha">Poha</option>
                                    <option value="upith">Upitthh</option>
                                    <option value="idli">Idli</option>
                                    <option value="dosa">Dosa</option>
                                    <option value="shira">Shira</option>
                                    <option value="wadapaav">WadaPaav</option>
                                    <option value="pakora">Pakora</option>
                                    <option value="milk">Milk</option>
                                    <option value="samosa">Samosa</option>
                                    <option value="bread">Bread</option>
                                    <option value="banana">Banana</option>
                                    <option value="biscuits">Biscuits</option>
                                    <option value="egg">Eggs</option>
                                    <option value="pizza">Pizza</option>
                                    <option value="burger">Burger</option>
                                    <option value="tea">Tea</option>
                                    <option value="coffee">Coffee</option>
                                    <option value="apple">Apple</option>                                    
                                </select><br>
                        Item 3: <select class="form-control" id="snack3" name="snack3" style="max-width:100%">
                                    <option value="null">Nothing</option>
                                    <option value="poha">Poha</option>
                                    <option value="upith">Upitthh</option>
                                    <option value="idli">Idli</option>
                                    <option value="dosa">Dosa</option>
                                    <option value="shira">Shira</option>
                                    <option value="wadapaav">WadaPaav</option>
                                    <option value="pakora">Pakora</option>
                                    <option value="milk">Milk</option>
                                    <option value="samosa">Samosa</option>
                                    <option value="bread">Bread</option>
                                    <option value="banana">Banana</option>
                                    <option value="biscuits">Biscuits</option>
                                    <option value="egg">Eggs</option>
                                    <option value="pizza">Pizza</option>
                                    <option value="burger">Burger</option>
                                    <option value="tea">Tea</option>
                                    <option value="coffee">Coffee</option>
                                    <option value="apple">Apple</option>                                    
                                </select><br>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="service-item">
                                <h4>
                                    <strong>Dinner</strong>
                                </h4><br>
                    Roti:<input type="number" name="roti2" placeholder="count"><br><br>
                    Rice:<input type="number" name="rice2" placeholder="small bowls"><br><br>
                                <label for="sel1">Along with:</label>
                                <select class="form-control" id="sabzi2" name="sabzi2" style="max-width:100%">
                                    <option value="null">Nothing</option>
                                    <option value="cereals">Cereals</option>
                                    <option value="greenv">Green Vegetables</option>
                                    <option value="eggc">Egg Curry</option>
                                    <option value="chickenc">Chicken Curry</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="yes" name="salat2">I had Salat</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button onclick="show()" value="submit">Submit</button>
                    
                </div>
            </div>
        </div>
    </section>


    <?php } ?>
    
    <!----------------------------------------------------------------- Footer ------------------------------------------------------------------>
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>SSSGrp11</strong>
                    </h4>
                    <p>Walchand College of Engineering
                        <br>Vishrambag, Sangli.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> +91 8237669414</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:sssgrp11@gmail.com">sssgrp11@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>

    <!-------------------------------------------------------------------------------------------------------------------------- -->

    <div id="profile2" class="modal" role="dialog">
    <div class="modal-dialog">

    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Profile</h4>
      </div>
      <div class="modal-body">
      
      <?php
    $nm=new MongoClient();
        $db=$nm->dietbook;
        $col=$db->userdata;

    $cursor=$col->find(array('email'=>$_SESSION['email']),array('fname','lname','email','mno','gender','age','weight','height','activity'));
    foreach ($cursor as $document) {
        $fname=$document['fname'];
        $lname=$document['lname'];
        $email=$document['email'];
        $mno=$document['mno'];
        $height=$document['height'];
        $weight=$document['weight'];
        $age=$document['age'];
        $gender=$document['gender'];
        }

?>
      
        <ul class="list-group">
            <li class="list-group-item"><strong>Name</strong>:&nbsp;&nbsp;<?php echo $fname." ".$lname ?></li>
            <li class="list-group-item"><strong>Email id </strong>:&nbsp;&nbsp;<?php echo $email ?></li>
              <li class="list-group-item"><strong> Mobile number</strong>:&nbsp;&nbsp;<?php echo $mno ?></li>
              <li class="list-group-item"><strong> Height</strong>:&nbsp;&nbsp;<?php echo $height."cm" ?></li>
              <li class="list-group-item"><strong> Weight</strong>:&nbsp;&nbsp;<?php echo $weight."kg" ?></li>
              <li class="list-group-item"><strong> Age</strong>:&nbsp;&nbsp;<?php echo $age."years" ?></li>
              <li class="list-group-item"><strong> Gender</strong>:&nbsp;&nbsp;<?php echo $gender ?></li>
    </ul>



    <button id='abc' type="button" class="btn btn-danger pull-left" >update Account</button>

    <script>
    $(document).ready(function(){
        $("#abc").click(function(){
            $("#profile2").modal('toggle');
            $("#upprofile").modal('show');
        });
    });
    </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


    
<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Profile</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <form action="profile-ac.php" method="POST">


                         <div class="radio">
<label>Gender:<br></label><br>
   <label>  <input type="radio" name="gender" value="male">Male</label>
</div>
<div class="radio">
  <label>   <input type="radio" name="gender" value="female">Female</label>
</div>

<div class="form-group">
    <label for="age" >Age:</label>
    <input type="number" class="form-control" name="age"  id="age" placeholder="in yeras" >
 </div>
 <div class="form-group">

    <label for="wt" >Weight:</label>
    <input type="number" class="form-control" name="weight"  id="wt" placeholder="in kgs" >
 </div>
 <div class="form-group">

    <label for="ht" >Height:</label>
    <input type="number" class="form-control" name="height"  id="ht" placeholder="in cms" >
 </div>

 <div class="form-group">
  <label for="exer">Activity level:</label>
  <select name="activity" action="profile-ac.php" class="form-control" id="exer">
    <option value="vhigh">Very High</option>
    <option value="high">High</option>
    <option value="med">Moderate</option>
    <option value="low">Low</option>
    <option value="vlow">Very Low</option>
  </select>
</div>

    <button type="submit" class="btn btn-danger pull-left" name="subpro">Submit</button>
 

</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>








<div id="upprofile" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Profile</h4>
            </div>
        <div class="modal-body">
        <?php
            require 'demo.php';
            //require 'fnneed.php';
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
            <div class="form-group">
                <form action="up-pro-ac.php" method="POST">
                    <label for="usr">First name:</label>
                    <input type="text" class="form-control" name="fname" value=" <?php echo $fname ?> " id="usr" readonly>
            </div>
             <div class="form-group">
                <label for="lnm">Last name:</label>
                <input type="text" class="form-control" name="lname" value=" <?php echo $lname ?> " id="lnm" readonly>
             </div>
              <div class="form-group">
                <label for="eml">Email Address:</label>
                <input type="text" class="form-control" name="email" value=" <?php echo $email ?> " id="eml" readonly>
             </div>
             <div class="form-group">
                <label for="mno">Mobile Number:</label>
                <input type="text" class="form-control" name="mno" value=" <?php echo $mno ?> " id="mno">
             </div>
             <div class="form-group">
                <label for="wt">Weight:</label>
                <input type="text" class="form-control" name="wt" value=" <?php echo $weight ?> " id="wt">
             </div>
             <div class="form-group">
                <label for="ht">Height:</label>
                <input type="text" class="form-control" name="ht" value=" <?php echo $height ?> " id="ht">
             </div>
             <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" class="form-control" name="age" value=" <?php echo $age ?> " id="age">
             </div>
             <div class="form-group">
                <label for="gen">Gender:</label>
                <input type="text" class="form-control" name="gen" value=" <?php echo $gender ?> " id="gen">
             </div>
             <div class="form-group">
                  <label for="exer">Activity:</label>
                  <select name="activity" action="up-pro-ac.php" class="form-control" id="exer">
                    <option value="vhigh">Very High</option>
                    <option value="high">High</option>
                    <option value="med">Moderate</option>
                    <option value="low">Low</option>
                    <option value="vlow">Very Low</option>
                  </select>
            </div>
            <button type="submit" class="btn btn-danger pull-left" name="savech">Save changes</button>
        </form>

       


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form action="loginac.php" method="POST" role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="email" class="form-control" name="email" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="pass" id="psw" placeholder="Enter password">
            </div>
            
              <button type="submit" name="login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          
        </div>
      </div>
      
    </div>
  </div>


  <div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Register</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          
          
          
          <form class="form-horizontal" action="registerac.php" method="POST">
    <div class="form-group">
   <label for="fname"> First name :</label> 
    <input type="text" name="fname" required id="fname">*<br>
    </div>
    <div class="form-group">
    <label for="lname"> Last name :</label> 
         <input type="text" name="lname" required id="lname">*<br>
    </div>
    <div class="form-group">
    <label for="email"> E-mail :</label>
         <input type="email" name="email" required id="email">*<br>
        </div>
        <div class="form-group">
    <label for="mno"> Mobile :</label> 
        <input type="text" name="mno" required id="mno"><br>
        </div>
        <div class="form-group">  
    <label for="pass"> Password :</label> 
        <input type="Password" id="pass" name="pass" required >*
        </div>
        
    
            

    <button type="submit" id="sub" class="btn btn-default" name="regup">Submit</button>
 
    </form>
    
    
        </div>

<div id="sh" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
    function show()
    {
        $.ajax(
        {
            url: "caloriecalc.php",
            success:function(result)
            {
                document.getElementById('sh').innerHTML=result;
            }
        });
    }
</script>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
      </div>
      
    </div>
  </div>
    





</body>

</html>
