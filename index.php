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
	<title>Zakorači u svet web programiranja!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">


	<link rel="stylesheet" href="css/meni.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
	<script type="text/javascript" src="/path/to/jquery-latest.js"></script> 
	<script type="text/javascript" src="js/meni.js"></script> 
	
</head>
<body background="imgs/11.jpg" style="background-attachment: fixed; background-repeat: no-repeat;">
	<div id="main-wrapper1" style="width: 900px; background-color: white; border: 3px solid #f1f1f1; border-radius : 10px; margin: 0 auto;">
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
					<li><a href="Tutorijali.php">Tutorijali</a></li>
					<?php } ?>
	              <li><a href="profil.php">Moj Profil</a></li>
	              <li><a href="log/logout.php">Izloguj se</a></li>
	            </ul>
	          </div>
	        </div>
	

		
		<br>
			<p style="text-shadow: 1px 1px #ccc;" class="text-center">
				<center><h3 style="color:#10AFAB; font: italic 36px;"> Dobrodošli <?php echo $_SESSION['username'];?>! </h3></center>
			</p>
			<div class="row">
			
			<br>	
			<center><div style="border:1.5px solid #333; background-color: #fff; border-radius:10px; padding:3px 3px; margin: 20px; box-shadow: 8px 8px 40px 1px #c2c2d6 ; align-content: center;"><p>Testiraj svoje znanje iz web programiranja i pohvali se rezultatom! Za svaki tačan odgovor osvajaš 20 poena, ali pazi! Netačan odgovor nosi negativnih 10 poena, dok preskakanje pitanja nosi negativnih 5. Srećno!</p>
			<p>Ukoliko se nisi susreo sa svim ponuđenim kategorijama, osnove možeš naučiti iz video materijala sa stranice Tutorijali, a ako želiš postati pravi profesionalac, poseti naš Webshop i poruči neka od najnovijih izdanja knjiga iz željene oblasi!</p>	</div> </center>

				<div class="col-xs-12 col-sm-6 col-lg-6">
				
					<div>
						<br>
						<br>
						<?php if(empty($_SESSION['username'])){?>
						<p>Greška</p>

						<?php }else{?>
						<div style="border:1.5px solid #333; background-color: #fff; border-radius:10px; padding:3px 3px; margin: 6px; box-shadow: 8px 8px 40px 1px #c2c2d6 ; align-content: center;">
						    <form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
                            <div class="form-group">
                                <select class="form-control" name="category" id="category">
                               	 <option selected disabled>Izaberi kategoriju</option> 
                                	<!--
                                  <option value="">Izaberi kategoriju</option>
                                  -->
                                  <option value="1">PHP</option>
                                  <option value="2">HTML</option>
                                  <option value="3">CSS</option>
                                  <option value="4">JavaScript</option>        
                                                          
                                </select>
                                <span class="help-block"></span>
                            </div>

                            <br>
                            <button class="btn btn-success btn-block" type="submit">
                                Započni kviz
                            </button>
                        </form>
                        </div>
						<?php }?>
					</div>
						
				</div>
				<br>
				<div class="col-xs-12 col-sm-6 col-lg-6">
				<p>
					<div class='image'>
						
						<img src="imgs/owl.jpg" class="img-responsive"/>
					</div>
						</p>
				</div>
			</div>
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/jquery.validate.min.js"></script>

		<script>
			$(document).ready(function() {
				$("#signin").validate({
					submitHandler : function() {
					    console.log(form.valid());
						if (form.valid()) {
						    alert("sf");
							return true;
						} else {
							return false;
						}

					},
					rules : {
						category:{
						    required : true
						}
					},
					messages : {
						
						category:{
                            required : "Molimo odaberite kategoriju da započnete kviz."
                        }
					},
					errorPlacement : function(error, element) {
						$(element).closest('.form-group').find('.help-block').html(error.html());
					},
					highlight : function(element) {
						$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success : function(element, lab) {
						var messages = new Array("Bravo");
						var num = Math.floor(Math.random() * 6);
						$(lab).closest('.form-group').find('.help-block').text(messages[num]);
						$(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');
					}
				});
			});
		</script>




		<div class="inner_containerbottom">
		  	<?php 
		    	include('footer.php');
		   	?>
	   </div>

   </div>
</body>
</html>
