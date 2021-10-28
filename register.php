<?php
session_start();
require 'includes/connect.php';
/*nese perdoruesi eshte i loguar 
if(isset ($_SESSION['username'])){
	header('Location:home.php');
	exit;
}*/
?>
<!DOCTYPE html>
<head>
<?php include "includes/template/admin_header.php"; ?>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
<title>Register </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link href="Style/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class='login-body reg'>
		<br>			
<div class="signupform">
	<div class="lgcontainer">
		
		<div class="agile_info">
			<div class="w3_info">
				<h2>Regjistrohuni ketu</h2>
				<?php
					//variablat per gabime
					$errorGen = $errorFname = $errorLname = $errorDepartament = $errorEmail = $errorEmail = $errorEmail = $errorID = $errorID = $errorID = $errorID = $errorPass = $errorPass = $errorPassTooltip = "";
					
					//kushti plotesohet kut klikohet butoni Submit ne form
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						
						
						include 'validate/registerValidate.php';
					}
					?>
		   <?php echo "<p class='error'>$errorEmail</p>"; ?>
		   <?php echo "<p class='error'>$errorID</p>"; ?>
		   <?php echo "<p class='error'>$errorPass</p>"; ?>
		   <?php echo "<p class='error'>$errorGen</p>"; ?>
				
			
						<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
						<div class="left margin">
							<label>Emri</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" name="emri" placeholder="Emri" required=""> 
								<?php
								echo "<p class='error'>$errorFname<p>";
								?>
							</div>
						</div>
						<div class="left">
							<label>Mbiemri</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" name="mbiemri" placeholder="Mbiemri" required=""> 
								
								<?php
								echo "<p class='error'>$errorLname<p>";
								?>
								</td>
							</div>
						</div>
						<div class="left margin">
							<label>Email </label>
							<div class="input-group">
								<span><i class="fa fa-envelope" aria-hidden="true"></i></span>
								<input type="email"  name ="email" placeholder="Email" required=""> 
							
							</div>
						</div>
						<div class="left">
							<label>Username</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" name="username" placeholder="Username" required="">
							</div>
						</div>
						<div class="left margin">
							<label>Fjalkalimi</label>
							<div class="input-group">
								<span><i class="fa fa-lock" aria-hidden="true"></i></span>
								<input type="Password" name="psw" placeholder="Fjalkalimi" required="">
							
							</div>
						</div>
						<div class="left">
							<label>Konfirmo Fjalkalimin</label>
							<div class="input-group">
								<span><i class="fa fa-lock" aria-hidden="true"></i></span>
								<input type="Password"  name="kpsw" placeholder="Konfirmo" required="">
							</div>
           
						</div>
						<input type="radio" name="abonimi" value="Basic">
						<label class="container-price">Basic: 7.00€ / muaj
            <span class="checkmark"></span>
            </label>
			<input type="radio" name="abonimi" value="Pro">
           <label class="container-price">Pro: 33.00€ / 6 muaj

           <span class="checkmark"></span>
           </label>
           <input type="radio" name="abonimi" value="Premium" style="margin-left:100px;"> 
           <label class="container-price">Premium: 55.00€ / vit
           <span class="checkmark"></span>
		   </label>
		   <br>
		   <button class="btn btn-danger btn-block" name="reg" type="submit" style="margin-left:100px;">	Vazhdo <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </button>            
					<?php
					if(isset($succes_message)){
						echo $sucess_message;
					}
					if(isset($error)){
						echo $error;
					}
					?>
		
			</form>
			</div>
			
			<div class="w3l_form">
				<div class="left_grid_info">
					<h3>Jeni te Regjistruar?</h3>
					<p>Klikoni ketu per tu loguar </p>
					<a href="login.php" class="rbtn">Login <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="clear"></div>
			</div>
			
		</div>
		<br>			

	</div>
	</body>
	<footer>
	<?php include "includes/template/footer.php";?>
	</footer>
</html>
