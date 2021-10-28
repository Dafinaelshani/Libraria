<?php session_start();
require('includes/connect.php');
$libri_id=$_GET['id'];
			 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<link href= 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'> 
      
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" > 
    </script> 
      
  <script src= "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" > </script>

<link rel="stylesheet" type="text/css" href="Style/style.css">

</head>
<body>
<!-- start header -->
<div id="header">
	<div id="menu">
		<?php
			include("includes/template/admin_header.php");
		?>
	</div>
</div>
<div id="logo-wrap">
<div id="logo">
		<?php
		//	include("includes/logo.inc.php");
		?>
</div>
</div>
<!-- end header -->
<!-- start page -->

<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post" style="margin-left:100px">
			<div class="entry" >
			<div class="forma1">
			<center>
			
						<h3 class="title" >Zgjedh Kategorite </h3>
						</center>

				<form action='' method='POST' >
				
						
						<br><br>
						
						<b>Kategoria:</b><br>
								<?php

                $query = mysqli_query($conn, "SELECT emri FROM kategori");

//tani na nevojitet te i marrim keto rreshta rezultat nga query i ekzekutuar
//meqe rezultati permban disa rreshta si rezultat qe kthehen nga query i ekzekutuar me larte, atehere duhet te iterojme ne secilin rresht me nje cikel
while($row = @mysqli_fetch_assoc($query)) { //ne secilin iterim variabla $row do te permbaje nje rresht rezultat nga vargu i rezultateve te kthyera
	//meqe funksioni i perdorur mysqli_fetch_assoc na kthen rreshtat rezultat si varg asociativ, atehere na duhet te marrim vetem vleren e atributut emri te tabeles departamenti
	$emri = $row['emri'];
	
	//vendosja e te dhenave te marra ne etiketat <option> ne HTML
	echo "<input type='checkbox' value='$emri' name='check[]'>$emri";
}

	
?>
								
						</select>
												
						
						<br><br>
						<center>
						<input class="btn" type='submit' name='shto' value='   Shto  '  >
						<br>
						<br>
				</form>
			</div>
			
		</div>
		</div>
		</div>
	</div>
	<?php
	        if(isset($_POST['shto'])){

	$b_cat=$_POST['check'];

	
	if(!empty($_POST['check'])){
	                     foreach($b_cat as $value){
							 
					$sql=mysqli_query($conn,"SELECT * FROM kategori WHERE emri='".$value."'");
			        $r= mysqli_fetch_array($sql);
					$kat_id=$r['id'];

					    
					
						$query2="INSERT INTO libri_ka_kategori (libri_id, kategori_id) VALUES ('$libri_id','".$kat_id."')";  
						mysqli_query($conn,$query2) or die(mysqli_error($conn));  
					}  
						echo "Record is inserted";
					echo("<script>location.href='all_book.php';</script>");

					}

						
			}  
	
	?>
	
	
	<!-- end content -->
	<!-- start sidebar -->
	
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
			<?php
			//	include("includes/footer.inc.php");
			?>
</div>
<!-- end footer -->
</body>
</html>