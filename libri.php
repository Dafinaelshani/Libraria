<?php
session_start();
require 'includes/connect.php';
// kontrollo nese perdoruesi eshte loguar

if(isset($_SESSION['username']) && !empty($_SESSION['username']&&$_SESSION['statusi'])){
	

  $username = $_SESSION['username'];
  

$get_user_data = mysqli_query($conn, "SELECT * FROM `perdoruesi` WHERE username = '$username'");
$userData =  mysqli_fetch_assoc($get_user_data);

$i=(int)$_GET['id'];
	$res=mysqli_query($conn,"select * from librat where id=$i") or die("Can't Execute Query..");
  $row=mysqli_fetch_assoc($res);

}else{
echo '<style> #downloadb, #readb, .reviewoption {display:none;}
 
  } 
 
  </style>';}
?>

<!DOCTYPE html>
	<head>
    <title>Bookworm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery.js"></script>

		<link rel="stylesheet" type="text/css" href="Style/style.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
  
	
	</head>
  
<?php 
$i=(int)$_GET['id'];
	$res=mysqli_query($conn,"select * from librat where id=$i") or die("Can't Execute Query..");
  $row=mysqli_fetch_assoc($res);
  ?>
	<body>
			<?php include "includes/template/admin_header.php";?>
			
			<section class="main-text" >
      <br>
      <?php include "includes/template/message.php";?>
<br>
<section class="main-text" >
<br>
<br>
<div class="book-container">
<div class="pic-left">
<?php
echo '<img src="'.$row['foto'].'"style="width:250px; height:360px;">';?>
<br>
</div>
<div class ="dsc-right">
<?php
echo '<h4>'.$row['emri'].'</h4>';?>
<?php
echo '<h4 style="color:grey;">'.$row['emri_autorit'].'</h4>';?>


<h6 class="description ellipsis"><?=$row['pershkrimi']?></h6>
 <a href="#!" style="color:black;"class="read-more"><h6>Shiko me shume</h6></a>
<?php
 echo '<a class="buton" id="downloadb" href="shkarko.php?id='. $row['id'].'">Shkarko</a>';

 echo '<a class="buton" id="readb" style="margin-left:5px;" href="lexo_liber.php?id='. $row['id'].'">Lexo tani!</a>';
?>

</div>
</div>	
<div class="book-container">


	<?php

$query = mysqli_query($conn,"SELECT AVG(rating) as AVGRATE from rating where libri_id='".$i."'");
$row = mysqli_fetch_array($query);
$AVGRATE=$row['AVGRATE'];
$query = mysqli_query($conn,"SELECT count(rating) as Total from rating where libri_id='".$i."'");
$row = mysqli_fetch_array($query);
$Total=$row['Total'];
$query = mysqli_query($conn,"SELECT count(review) as Totalreview from  rating  where libri_id='".$i."'");
$row = mysqli_fetch_array($query);
$Total_review=$row['Totalreview'];
$review = mysqli_query($conn,"SELECT * from rating  where libri_id=".$i);
$rating = mysqli_query($conn,"SELECT count(*) as Total,rating from rating group by rating order by rating desc");
$ratingg= mysqli_query($conn,"SELECT count(*) as Total,rating from rating where libri_id='".$i."'group by rating order by rating desc");
$db_ratin= mysqli_fetch_array($ratingg);
?>

	<div class="pic-left">
		<b>Rating & Reviews</b>
		<b><?php echo round($AVGRATE,1);?></b> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i><br>
			<?=$Total;?> ratings and <?=$Total_review;?> reviews
		</div>
		<div class="dsc-right" style="padding-top:10px;">
			<?php
			if($db_ratin['Total']>0){
			while($db_rating= mysqli_fetch_array($rating)){
			?>
				<?=$db_ratin['rating'];?> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;"></i> Total <?=$db_ratin['Total'];?><br>
			
			<?php	
			}
			}
				
			?>
			<br>	
		</div>
</div>
	<div class="book-container">
		<?php
			while($db_review= mysqli_fetch_array($review)){
		?>
				<h4><?=$db_review['rating'];?> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;"></i> by <span style="font-size:14px;"><?=$db_review['username'];?></span></h4>
				<p><?=$db_review['review'];?></p>
				<hr>
		<?php	
			}
				
		?>
	</div>
		<div class='reviewoption'>

	<br>
	  <form method="post">

	<div class="book-container">
	<div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div>
  <br>
<textarea class="text"  placeholder="Shkruaj cka mendoni per librin..." name="review" required></textarea><br>
<p><button name="save" class="btn">Dergo</button></p>
</form>
</div>
<?php
if(isset($_POST['save']))
{
$rating=$_POST['rate'];
$review=$_POST['review'];

$sql = "INSERT INTO `rating`( `rating`, `review`, `libri_id`, `username`) VALUES ('$rating','$review','$i','$username')";
		 if (mysqli_query($conn, $sql)) {
		echo "Mesazhi juaj u dergua me sukses !";
		echo("<script>location.href='libri.php?id=".$i."';</script>");


	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>

</div>
</div>

<br>
<br>



</div>
  </div>
 

</section>
<br>
<br>
<br>



	<footer>
	<?php include "includes/template/footer.php";?>
	</footer>
</body>
</html>
		