<?php
session_start();
require 'includes/connect.php';
require 'validate/loginValidate.php';
 
//nese perdoruesi eshte i loguar
/*if (isset($_SESSION['username'])){
	header('Location: home.php');
	exit;
}*/

?>
<!DOCTYPE html>

<head>
			<?php include "includes/template/admin_header.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="Style/style.css">
<meta charset="utf-8">
<link href="Style/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class='login-body'>
	<br>
<div class="signupform">
	<div class="lgcontainer">
		
		<div class="agile_info">
			<div class="w3_info">
				<h2>Logohu ketu</h2>
				    <form action="#" method="post">
						<div>
							<label>Username</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" name="username" placeholder="Username" required="">
							</div>
						</div>
						<div>
							<label>Fjalkalimi</label>
							<div class="input-group">
								<span><i class="fa fa-lock" aria-hidden="true"></i></span>
								<input type="Password" name="psw" placeholder="Fjalkalimi" required="">
							</div>
						</div>
			
						
						
							<button class="btn btn-danger btn-block" type="submit">Login</button >                
							<?php 
					
					
					if(isset($success_message)){
						echo $success_message;
					}
					if(isset($error_message)){
						echo $error_message;
					}
					
					
					?>
					</form>
			</div>
			<div class="w3l_form">
				<div class="left_grid_info">
					<h3>Pershendetje!</h3>
					<p>Klikoni ketu per te krijuar nje llogari te re </p>
					<a href="register.php" class="rbtn">Regjistrohu <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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
<?php /*
   if($statusi=='Aktiv'){
	header('Location: home.php');
	exit;
   }
   else if($statusi=="Pasiv"){
	header('Location: index.php');
	exit; 
   }*/

?>