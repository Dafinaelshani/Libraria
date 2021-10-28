<?php
require('includes/connect.php');
 session_start();
	
	
	
	$search=$_GET['s'];
	$query="select * from librat where emri like '%$search%' or emri_autorit like '%$search%'";
	
	$res=mysqli_query($conn,$query) or die("Can't Execute Query...");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="Style/style.css">

		<?php
			include("includes/template/admin_header.php");
		?>
</head>

<body>
			<!-- start header -->
				<div id="header">
					<div id="menu">
						<?php
							//include("includes/menu.inc.php");
						?>
					</div>
				</div>
				
				<div id="logo-wrap">
					<div id="logo">
							<?php
								//include("includes/logo.inc.php");
							?>
					</div>
				</div>
			<!-- end header -->
			
			<!-- start page -->

				<div id="page">
					<!-- start content -->
							<div id="content">
								<div class="post">
									<!-- <h1 class="title"><?php //echo @$_GET['cat'];?></h1>-->
									<div class="entry">
										
									<table >
											<br><br><br><br><br>
											<?php
												
												$count=0;
												while($row1=mysqli_fetch_assoc($res))
												{
													if($count==0)
													{
														echo '<tr>';
													}	
													echo '<td style="padding-left:50px;padding-right:50px;"> <div class="column">
													         <div class="hvr-grow-shadow">
														<a href="libri.php?id='.$row1['id'].'" style="text-decoration:none; color:black;">
														<img src="'.$row1['foto'].'" class="booksimg">
														<br><h5 style="text-align:center">'.$row1['emri'].'<br>'.$row1['emri_autorit'].'</h5></a>
													</td></div> </div>';
													$count++;							
													
												
													if($count==4)
													{
														echo '</tr>';
														$count=0;
													}
												}
											?>
									</table>
									</div>
									
								</div>
								
							</div>
					<!-- end content -->
					
					<!-- start sidebar -->
							<div id="sidebar">
									<?php
										//include("includes/search.inc.php");
									?>
							</div>
					<!-- end sidebar -->
					<div style="clear: both;">&nbsp;</div>
				</div>
			<!-- end page -->
			
				
			<!-- start footer -->
				<div id="footer">
							<?php
								include("includes/template/footer.php");
							?>
				</div>
			<!-- end footer -->
</body>
</html>
