<?php
	session_start();
	require_once('dbconfig/config.php');
	header('Content-Type: text/html; charset=utf-8');
	include('Book.php');
	//phpinfo();
	if (!isset($_SESSION['username']))
{
    header("Location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Moj profil</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/meni.css">
	<script type="text/javascript" src="js/meni.js"></script> 
	<script type="text/javascript" src="script/validation.min.js"></script>
	<script type="text/javascript" src="script/ajax.js"></script>

	
</head>
<body background="imgs/11.jpg" style="background-attachment: fixed; background-repeat: no-repeat;">
	<div id="main-wrapper" style="width: 900px; background-color: white; border: 3px solid #f1f1f1; border-radius : 10px; margin: 0 auto;">
		 <div id="sse1">
	          <div id="sses1">
	            <ul>
	            <?php if($_SESSION['username']!=='admin'){
	            	?>
					<li><a href="index.php">Igre</a></li>
					<?php }else{ ?>
					<li><a href="knjige.php">Knjige</a></li> <?php
	            	}?>         
	              <li><a href="rang.php">Rang lista</a></li>
	             	<?php if($_SESSION['username']!=='admin'){
	            	?>
					<li><a href="webshop.php">Online prodavnica</a></li>
	              	<li><a href="anketa.php">Anketa</a></li>
					<?php } ?>
	              <li><a href="profil.php">Moj Profil</a></li>
	              <li><a href="log/logout.php">Izloguj se</a></li>
	            </ul>
	          </div>
	        </div>
						
		

		<form action="knjige.php" method="post" id="firstsprof" accept-charset="UTF-8">
			<div><h2 style="color: #F77C77; padding-bottom: 9px;"><center>Unos ili izmena knjiga</center></h2></div>
			<div class="inner_container"><!---->
				<input type="text" class="frst" placeholder="Naziv" name="name" >
				<input type="text" placeholder="Slika" name="model" >
				<input type="text" style="border-radius: 0 0 8px 8px;" placeholder="Cena" name="color" >
				<input type="text" style="border-radius: 0 0 8px 8px;" placeholder="Video" name="demo" >
				<input type="text" style="border-radius: 0 0 8px 8px;" placeholder="Opis" name="opis" >
				

				<button name="submit" class="sign_up_btn" type="submit">Dodaj</button>
				<button name="update" class="sign_up_btn" type="submit">Izmeni</button>			
			</div>	
		</form>
		<form action="knjige.php" method="get" id="firstsprof" accept-charset="UTF-8">
			<div><h2 style="color: #F77C77; padding-bottom: 9px;"><center>Obriši knjigu</center></h2></div>
			<div class="inner_container"><!---->
				<input type="text" style="border-radius: 0 0 8px 8px;" class="frst" placeholder="Unesi ID knjige" name="id" >

				<button name="delete" class="sign_up_btn" type="submit">Obriši</button>			
			</div>	
		</form>


		<?php

			$knjiga = new Book();

			if(isset($_POST['submit']))
			{
			
				$knjiga->addBook();
				 

			}
				
			if(isset($_GET['delete']))
			{
				$knjiga->deleteBook();
			}
			if(isset($_POST['update']))
			{
				$knjiga->editBook();
				
			}
				
			 
			

		 ?>
		 	<div class="inner_containerbottom">
		  	<?php 
		    	include('footer.php');
		   	?>
	   </div>
</body>
</html>