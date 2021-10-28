
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<script src="js/jquery.js"></script>

<?php

require 'includes/connect.php';
//require 'register.php';
			 include "includes/template/admin_header.php";
			 $username=$_GET['username'];
			 $sql=mysqli_query($conn,"SELECT * FROM perdoruesi WHERE username='".$username."'");
			 $row= mysqli_fetch_array($sql);			 
?>

		<link rel="stylesheet" type="text/css" href="Style/style.css">
<title> Informatat e pagesese</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link href="Style/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="login-body">
<div class="signupform">
	<div class="lgcontainer">
		
		<div class="agile_info">
			<div class="w3_info">
				<h2>Regjistrohuni ketu</h2>
						<form action="#" method="post">
						<div class="left margin">
							<label>Card Holder</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" name="cardholder" placeholder="Card Holder" required=""> 
							</div>
						</div>
						<div class="left">
							<label>Card Number</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" name="cardnumber" data-mask="0000 0000 0000 0000" placeholder="Card Number" required=""> 
							</div>
						</div>
						<div class="left margin">
							<label>Expiry Date </label>
							<div class="input-group">
								<span><i class="fa fa-envelope" aria-hidden="true"></i></span>
								<input type="text" name="expiry-data" placeholder="MM/YY" required=""> 
							</div>
						</div>
						<div class="left">
							<label>CVC</label>
							<div class="input-group">
								<span><i class="fa fa-phone" aria-hidden="true"></i></span>
								<input type="text" name="cvc" placeholder="CVCS" data-mask="000" required="">
							</div>
						</div>
           <a href="login.php" class="btn btn-danger btn-block" type="submit" name="reg1">Regjistrohuni Tani <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>                
					</form>
			</div>
			<div class="w3l_form">
				<div class="left_grid_info">
					<h3>Jeni te Regjistruar?</h3>
					<p>Klikoni ketu per tu loguar </p>
					<a href="#" class="rbtn">Login <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="clear"></div>
			</div>
		</div>
		<?php

	/*	if ($insertt) {
echo("<script>location.href='login.php';</script>");
		}*/
		?>
	</div>

	</body>
	<footer>
	<?php include "includes/template/footer.php";?>
	</footer>
</html>