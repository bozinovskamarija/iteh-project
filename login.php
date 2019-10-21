<?php
	if(session_id())
		session_destroy();
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>Prijavljivanje</title>
<link rel="stylesheet" href="css/stylelr.css">
</head>
<body background="imgs/11.jpg" style="background-attachment: fixed; background-repeat: no-repeat;">
	<div id="main-wrapper">
		<form action="login.php" method="post" id="whole">
		<div>
			<h2 style="color: #F77C77; padding-bottom: 15px;"><center>Prijavi se</center></h2>
		</div>
			<div class="inner_container">
				<input type="text" placeholder="Korisničko ime" class="frst" name="username" required>
				<input type="password" placeholder="Šifra" name="password" required style="border-radius: 0 0 8px 8px">
				<br>
				<br>
				<button class="login_button" name="login" type="submit">Ulogujte se</button>

				<div class="bottom">
					<center>
					Niste  registrovani? <a href="register.php">Registrujte se ovde!</a>
					</center>
				</div>	
			</div>
		</form>
		<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];

				
				$query = "SELECT * FROM users WHERE username='".mysqli_real_escape_string($con, $username)."' AND password='".mysqli_real_escape_string($con,$password)."' ";
				
				$query_run = mysqli_query($con,$query);
				
				if($query_run)
				{
					if(mysqli_num_rows($query_run)===1)
					{
					//$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					if($_SESSION['username']!=='admin'){
						header( "Location: index.php");	
	            	}else{ 
	            		header('Location: knjige.php');
	            	}
					
					
					}
					else
					{
						echo '<script type="text/javascript">alert("Pogrešno ste uneli podatke. Nismo pronašli korisnika sa tim podacima.")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Greška sa bazom podataka.")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>