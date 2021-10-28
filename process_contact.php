<?php
require('includes/connect.php');	
	
	if(!empty($_POST))
	{
		$msg=array();
		
		if(empty($_POST['usrname']) || empty($_POST['subjekti']) || empty($_POST['mesazhi']))
		{
			$msg[]="Please full fill all requirement";
		}
		
				
		if(is_numeric($_POST['usrname']))
		{
			$msg[]="Name must be in String Format...";
		}
		
	
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			$nm=$_POST['usrname'];
			$sub=$_POST['subjekti'];
			$question=$_POST['mesazhi'];
	
			
			//$q='select p.id from perdoruesi p,kerkesa k where k.user_id=p.id and p.username="$nm"';
			$res = mysqli_query($conn, "SELECT p.id from perdoruesi p,kerkesa k where k.user_id=p.id and p.username = '{$nm}'");
			$row = mysqli_fetch_assoc($res);
            $memberId = $row['id']; 

			$query = "INSERT INTO kerkesa
			(subjekti,pershkrimi,user_id) values 
			('$sub','$question',$memberId);";
		
		    
			mysqli_query($conn, $query) or die or trigger_error("Error: ".mysqli_error($conn));
		  
			header("location:home.php");
		}
	}
	else
	{
		header("location:index.php");
	}
?>