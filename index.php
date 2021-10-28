
<?php
session_start();
include_once 'includes/connect.php';?>

<!DOCTYPE html>
	<head>
    <title>Bookworm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="Style/style.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>
			<?php include "includes/template/header.php";
?>
			
			<section class="main-text" >
      <br>

			
			<i class="fa fa-book fa-5x" aria-hidden="true" style="color:#D6C299;"></i>
				<h2> Bëhu pjesë e Bookworm!</h2>
				<h3> Parajsa juaj me libra, kudo & kurdo</h3>
  
  <div class="price-box" >
  <ul class="price">
    <li class="header">Basic</li>
    <li class="grey">7.00€ / muaj</li>
	<div class="hvr-glow">
        <li class="grey"><a href="register.php" class="button">Regjistrohu</a></li>
</div>
  </ul>
</div>

<div class="price-box">
  <ul class="price">
    <li class="header" style="background-color:#4CAF50">Pro</li>
    <li class="grey">33.00€ / 6 muaj</li>
    
    <li class="grey"><a href="register.php" class="button">Regjistrohu</a></li>
  </ul>
</div>

<div class="price-box">
  <ul class="price">
    <li class="header">Premium</li>
    <li class="grey">55.00€ / vit</li>
    
    <li class="grey"><a href="register.php" class="button">Regjistrohu</a></li>
  </ul>
</div>
	</section>

<br>
	
<section class="main-text" >
         <div class="hvr-grow-shadow">

		<h3>Librat me te ri</h3>
		<hr class="hrpink">
		<hr class="hrlightpink">
		</div>
		<br>
		<br>

		<?php
$result = mysqli_query($conn,"SELECT * FROM librat ORDER BY id DESC LIMIT 4");
//print values to screen
while ($row = mysqli_fetch_assoc($result)) {
	
  echo'
    

  <div class="column">
 
  <div class="hvr-grow-shadow">
  
   <a href="libri.php?id='.$row['id'].'" style="text-decoration:none; color:black;">
   <img src="'.$row['foto'].'" alt="Snow" style="width:150px; height:250px;">
    <h5 style="text-align:center">'.$row['emri'].' <br>'.$row['emri_autorit'].'</h5>
</a>
  </div>
</div>
';
}
mysqli_free_result($result);
?>

 
 

</section>
<br>

		
<section class="main-text" >
	
		  <div class="hvr-grow-shadow">

		    <H3>Librat me te shitur</h3>
			<hr class="hrpink">
			<hr class="hrlightpink">
			</div>
	   
		<br>
		<br>
		<?php
$result1 = mysqli_query($conn,"select *
from librat  
where id in(SELECT id 
           from lexon
           group by(libri_id)
           order by count(libri_id) DESC)
           limit 4");
//print values to screen
while ($row1 = mysqli_fetch_assoc($result1)) {
	
  echo'
    

  <div class="column">
 
  <div class="hvr-grow-shadow">
  
   <a href="libri.php?id='.$row1['id'].'" style="text-decoration:none; color:black;">
   <img src="'.$row1['foto'].'" alt="Snow" style="width:150px; height:250px;">
    <h5 style="text-align:center">'.$row1['emri'].' <br>'.$row1['emri_autorit'].'</h5>
</a>
  </div>
</div>
';
}
?>
<br><br>

</section>
<br><br>
<section class="main-text" style="	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
" >
         <div class="hvr-grow-shadow">

		<h3 style="color:#75b9be">Se Shpejti</h3>
		<hr class="hrpink" >
		<hr class="hrlightpink" >
		</div>
		<br>
		<br>

  <div class="column">
 
  <div class="hvr-grow-shadow">
    <img src="images/L5.jpg" alt="Snow" style="width:150px; height:250px;">
    <h5 style="text-align:center;color:#75b9be">The Fates Divide(2021) <br>Veronica Roth</h5>
  </div>
   </div>

  
  <div class="column">

    <div class="hvr-grow-shadow">
    <img src="images/L8.jpg" alt="Snow"  style="width:150px; height:250px;">
		<h5 style="text-align:center;color:#75b9be">War Storm(2021) <br>Victoria Aveyard</h5>
    </div>
  </div>
  
  
  <div class="column">
  
    <div class="hvr-grow-shadow">
    <img src="images/L3.jpg" alt="Snow"   style="width:150px; height:250px;">
		<h5 style="text-align:center;color:#75b9be">Unravel Me(2021) <br>Tahereth Mafi</h5>
    </div>
  </div>
  
  
  <div class="column">
 
    <div class="hvr-grow-shadow">
    <img src="images/L4.jpg" alt="Snow"   style="width:150px; height:250px;">
		<h5 style="text-align:center ;color:#75b9be">A Court Of Wings And Ruin(2021)<br>Sarah J Maas</h5>
    </div>
  </div>
 

</section>

  
 

</section >
<br>
<br>
<br>

	<footer>
	<?php include "includes/template/footer.php";?>
	</footer>
</body>
</html>
		