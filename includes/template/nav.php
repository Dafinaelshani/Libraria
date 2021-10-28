
 <html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
    <body>


<nav class="mynav">
<ul  id="myTopnav">
  <li><a href='index.php'><img src='images/logo1.png' onmouseover="hover(this);" onmouseout="unhover(this);"> </a></li>
  <div class="navright">
<?php
// $books_by_categori="select l.emri, l.foto from librat l, libri_ka_kategori kat, kategori k where l.id=kat.libri_id and k.id=kat.kategori_id and k.emri='aksion'";
 $result = mysqli_query($conn,"Select * from kategori");
                          $rowcount = mysqli_num_rows($result);

                          if($rowcount) {
                              $select = '';
                              
                              //echo $select;
                              while($ro=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                //printf ("%s \n",$row["country"]);
                              //  $select.='<a href="booklist.php?id=".$ro["id"]".&emri=".$ro["emri"]"">'.$ro['emri'].'</a>';
                                $select.='<a href="booklist.php?id='.$ro['id'].'&emri='.$ro['emri'].'">'.$ro['emri'].'</a>';

                                //echo $select;
                            }
                              $select;
                         
                          }

		//nese perdoruesi nuk eshte kyq ne sistem
		if(!isset($_SESSION['username'])) {
			echo '
			<li class="search-container search"> 
			<form action="search_result.php" method="GET" id="content">
			<input type="text" id="s" name="s" placeholder="Kërko.." name="search">
			<button type="submit" id="search-btn"><i class="fa fa-search"></i></button>
			</form>
			</li>
					<li><a href="login.php">KYQJA</a><li>';
		} 
		//nese perdoruesi eshte kyqur ne sistem
		else {
			if(isset($_SESSION['roli'])) {
				//perdorues
				if($_SESSION['roli'] == 2) {
          echo '
          <li class="search-container search"> 
          <form action="search_result.php" method="GET" id="content">
          <input type="text" id="s" name="s" placeholder="Kërko.." name="search">
          <button type="submit" id="search-btn"><i class="fa fa-search"></i></button>
          </form>
          </li>
          <li><a href="home.php">BALLINA</a></li>
	
	<div class="dropdown">		
     <li><a href>KATEGORITE </a>
    <div class="dropdown-content">'
						  . $select.'
						  </div></li></div>
						';
				}

				//administrator
				else if($_SESSION['roli'] == 1) {
					
					echo '
					 <li><a href="adminhome.php">HOME</a></li>
					<li><a href="kategorite.php">KATEGORITE</a></li>
					<li><a href="librat.php">LIBRAT</a></li>
					<li><a href="perdoruesit.php">PERDORUESIT</a></li>
					<li><a href="abonimet.php">ABONIMET</a><li>
				    <li><a href="mesazhet.php">MESAZHET</a></li>
					';
				}
			}
			echo '<li><a href = "includes/logout.php">LOGOUT</a></li>';
		}
	?>


</div>
  </ul>
</nav>

</body>
</html>
<script src="js/all.js"></script>
