<?php
	session_start();
	require_once('dbconfig/config.php');
	header('Content-Type: text/html; charset=utf-8');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" href="css/stylelr.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



</head>
<body background="imgs/11.jpg" style="background-attachment: fixed; background-repeat: no-repeat;">
	<div id="main-wrapper">
		<form action="register.php" method="post" id="whole" accept-charset="UTF-8">	
		<div><h2 style="color: #F77C77; padding-bottom: 15px;"><center>Napravi svoj nalog</center></h2></div>	
			<div class="inner_container">	
				<input type="text" class="frst" placeholder="Korisničko ime" name="username" required>
				<input type="password" placeholder="Šifra" name="password" required>
				<input type="password" placeholder="Potvrdite šifru" name="cpassword" required>
				<input type="email" placeholder="E-mail addresa" name="email" required>
				<input type="text" placeholder="Ime" name="name" required>
				<input type="text" placeholder="Prezime" name="lastname" value="" id="auto" required>
				<group class="inline-radio">
					<div><input type="radio" name="gender" value="male"><label>Muško</label></div>
					<div><input type="radio" name="gender" value="female"><label>Žensko</label></div>
				</group>
				<center>
				<br style="line-height:1vh"/>
				<div class="g-recaptcha" data-sitekey="6Lek94wUAAAAAKopcMjFwseVxUcTzEk8hkTN52O4"></div>
				</center>
				<button name="register" class="sign_up_btn" type="submit">Registruj se</button>	
				<div class="bottom">
					<center>
					Već imaš nalog? <a href="login.php">Uloguj se ovde!</a>
					</center>
				</div>
			</div>
			
		</form>
		
		<?php
			if(isset($_POST['register']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				@$email=$_POST['email'];
				@$name=$_POST['name'];
				@$lastname=$_POST['lastname'];
				@$gender=$_POST['gender'];

				$secretKey="6Lek94wUAAAAAPZT3u2OsUngdU5zKBIVYz_Ioc1d";
				$responseKey=$_POST['g-recaptcha-response'];
				$userIP=$_SERVER['REMOTE_ADDR'];

				$url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
				$response=file_get_contents($url);

				
				if($password==$cpassword)
				{
					//$query = "SELECT * FROM users WHERE username='".mysqli_real_escape_string($username)."'";
					$query = "SELECT * FROM users WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
				
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Ovo korisničko ime već postoji! Molimo izaberite neko drugo.")</script>';
						}
						
						else 
						{
				         $response=json_decode($response);
				         if(!$response-> success) { echo '<script type="text/javascript">alert("Pogrešan reCAPTCHA kod. Molimo pokušajte opet.")</script>'; }

							  else {
					  			
								$query = "INSERT INTO users(username, password, name, lastname, email, gender) VALUES('".mysqli_real_escape_string($con,$username)."','".mysqli_real_escape_string($con,$password)."', '".mysqli_real_escape_string($con,$name)."', '".mysqli_real_escape_string($con,$lastname)."', '".mysqli_real_escape_string($con,$email)."', '".mysqli_real_escape_string($con,$gender)."')";
								/*
								$query = "INSERT INTO users(username, password, name, lastname, email, gender) VALUES('$username','$password', '$name', '$lastname', '$email', '$gender')";*/
								$query_run = mysqli_query($con,$query);

								if($query_run)
								{
									echo '<script type="text/javascript">alert("Korisnik je registrovan! Dobro došli!")</script>';
									$_SESSION['username'] = $username;
									$_SESSION['password'] = $password;

									header( "Location: index.php");
								}
								else
								{
									echo '<p class="bg-danger msg-block">Registracija nije uspela zbog greške sa serverom. Molimo pokušajte opet.</p>';
								}
							}
						}										
					}
					else
					{
						echo '<script type="text/javascript">alert("Greška sa bazom.")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Polje za šifru i potvrdu šifre ne sadrže istu vrednost.")</script>';
				}
				
			}
			
			{
			}
		?>
	</div>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>