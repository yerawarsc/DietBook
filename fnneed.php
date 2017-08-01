<?php
    session_start();
	include 'demo.php';
  
	function register($docs){
		global $collection;
		$collection->insert($docs);
		return true;
}

	function chckmail($email)
	{
		global $collection;
		$temp=$collection->findOne(array("email"=>$email));
		if(empty($temp))
		{
			return true;
		}
		else
		{
				return false;	
		}
}
function setsess($email)
{
	
	$_SESSION['email'] = $email;
	global $collection;
	$temp = $collection->findOne(array('email'=> $email));
	return true;
}


function chkLogin(){
        
        //var_dump($_SESSION);
        
      if(isset($_SESSION['email'])){
            return true;
        }
        else{
            return false;
        }
    }

    function statchk($stat){
    	
    	if($stat!=0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}

    		

    }

/*function userout()
{
    session_destroy();

}*/

function bmr($weight,$height,$age,$gender,$activity)
	{
		
		if($gender=="male")
		{
			$res=(13.75*$weight)+(5*$height)-(6.76*$age)+66;
		}
		else
		{
			$res=(9.56*$weight)+(1.85*$height)-(4.68*$age)+665;
		}
	
		switch ($activity)
		{
			case "vlow":
				$act=1.2;
				//$act=100;
				break;
		
			case "low":
				$act=1.2;
				//$act=200;
				break;
			
			case "med":
				$act=1.55;
				//$act=350;
				break;
			
			case "high":
				$act=1.725;
				//$act=500;
				break;
		
			case "vhigh":
				$act=1.9;
				//$act=650;
				break;
			
			default:
				$act=1;
				break;
		}
		
		$res=$res*$act;

		return $res;
	}
	
	
	function bmi($weight,$height)
	{
		$bmi=$weight/pow(($height/100),2);
		return $bmi;
	}
	
	function newwt($bmi,$height)
	{
		if($bmi<18.5)
		{	$wt=18.5*pow(($height/100),2);
			return $wt;
		}
		else
		{
			$wt=24.9*pow(($height/100),2);
			return $wt;
		}
			
	}
	
	function isadmin()
  {
    if(($_SESSION['email']==='savya1612@gmail.com')||($_SESSION['email']==='sankalpyerawar@gmail.com'))
        return true;
    else
        return false;
  }
  
  
  
  function reqcal()
	{
		$nm=new MongoClient();
		$db=$nm->dietbook;
		$col=$db->userdata;
		$cursor=$col->find(array('email'=>$_SESSION['email']),array('weight','height','age','gender','activity'));
		foreach ($cursor as $doc) 
		{
		$weight= $doc["weight"];
		$height= $doc["height"];
		$age= $doc["age"];
		$gender= $doc["gender"];
		$activity= $doc["activity"];
		}
	
		$bmi=bmi($weight,$height);
		if($bmi<18.5||$bmi>24.9)
		{
			$wt=newwt($bmi,$height);
			$res=bmr(($wt+$weight)/2,$height,$age,$gender,$activity);
			return $res;
		}
		else
		{	
			$res=bmr($weight,$height,$age,$gender,$activity);
			return $res;
		}
	}
	
	function getname()
	{
		$nm=new MongoClient();
		$db=$nm->dietbook;
		$col=$db->userdata;
		$cursor=$col->find(array('email'=>$_SESSION['email']),array('fname'));
		foreach ($cursor as $doc) 
		{
		$fname= $doc["fname"];
		}
		return $fname;
	}

	function bmn()
	{
		$m=new MongoClient();
		$db = $m->dietbook;
   		$col=$db->userdata;
   		$cursor=$col->find(array('email'=>$_SESSION['email']),array('weight','height'));
		foreach ($cursor as $doc) 
		{
		$weight= $doc["weight"];
		$height= $doc["height"];
		}
		$bmn=$weight/pow(($height/100),2);
		return $bmn;
	}


  ?>
