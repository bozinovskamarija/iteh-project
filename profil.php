<?php
	session_start();
	require_once('dbconfig/config.php');
	header('Content-Type: text/html; charset=utf-8');
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
					<li><a href="webshop.php">Online  prodavnica</a></li>
					<li><a href="Tutorijali.php">Tutorijali</a></li>
					<?php } ?>
	              <li><a href="profil.php">Moj Profil</a></li>
	              <li><a href="log/logout.php">Izloguj se</a></li>
	            </ul>
	          </div>
	        </div>
	  
		<form action="profil.php" method="post" id="firstsprof" accept-charset="UTF-8">
			<div><h2 style="color: #F77C77; padding-bottom: 15px;"><center>Izmeni svoj nalog</center></h2></div>
			<div class="inner_container"><!---->
				<input type="text" class="frst" placeholder="Ime" name="name" >
				<input type="text" placeholder="Prezime" name="lastname" >
				<input type="text" placeholder="Korisničko ime" name="username" >
				<input type="password" placeholder="Šifra" name="password" >
				<input type="email" placeholder="E-mail address" class="frst" style="border-radius: 0 0 8px 8px;" name="email" >
				
				<button name="submit" class="sign_up_btn" type="submit">Sačuvaj</button>			
			</div>	
		</form>
		<form action="profil.php" method="post" id="secondprof">
			<div class="bottom"> 
			<center>
			<?php
				if ($_SESSION['username']!=='admin'){ ?>
					Želite da obrišete nalog? <button class="delete_button" name="delete" type="submit">Kliknite ovde!</button>
					<?php
				}
					?>
					</center>
			</div>
		</form>
				<?php

					if(isset($_POST['delete']))
					{
						$username = $_SESSION['username'];
						$query= "DELETE FROM users WHERE username='$username'";
						$query_run = mysqli_query($con,$query);
						if($query_run){
							header( "Location: login.php");
							session_destroy();
						}
						else{
							echo "Greška!";	
						}	
					}	
					if(isset($_POST['submit']))
					{
						$username=$_SESSION['username'];
						$password=$_SESSION['password'];
						$id_get = mysqli_query($con, "SELECT * FROM users WHERE username='$username' LIMIT 1");

						$id = mysqli_fetch_array($id_get, MYSQLI_BOTH);
						$userid= $id['userid']; 
						$name= $id['name'];
						$lastname= $id['lastname'];
						$email= $id['email'];
						$gender= $id['gender'];
									
						if(!empty($_POST["username"]) )
						{		
							$username = $_POST['username'];
						} 
						if(!empty($_POST["name"]) )
						{		
							$name = $_POST['name'];
						} 
						if(!empty($_POST["lastname"]) )
						{		
							$lastname = $_POST['lastname'];
						} 
						if(!empty($_POST["password"]) )
						{
							$password = $_POST['password'];
						} 
						if(!empty($_POST["email"]) )
						{
							$email = $_POST['email'];
						}
						if(!empty($_POST["gender"]))
						{
							$gender = $_POST['gender'];
						} 
											
						$query2 = "UPDATE users SET username='$username', name='$name', lastname='$lastname', password='$password', email='$email', gender='$gender' where userid='$userid'";
						$query_run2 = mysqli_query($con,$query2);
						if($query_run2)
						{
							echo '<script type="text/javascript">alert("Podaci o korisniku su izmenjeni.")</script>';
							$_SESSION['username'] = $username;
							$_SESSION['password'] = $password;
							header( "Location: index.php");
						}
						else
						{
							echo '<p class="bg-danger msg-block">Podaci o korisniku nisu izmenjeni zbog greške sa serverom.</p>';
						}			
					}
				?>
				

</body>
</html>