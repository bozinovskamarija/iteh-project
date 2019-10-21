<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
  if (!isset($_SESSION['username']))
{
    header("Location: login.php");
    die();
}



require_once('dbconfig/config.php');
mysqli_set_charset($con,"utf8");
require ('funkcije2.php');
include('convert.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tutorijali</title>
	<link rel="stylesheet" href="css/meni.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
	<script type="text/javascript" src="/path/to/jquery-latest.js"></script> 
	<script type="text/javascript" src="js/meni.js"></script> 
  <script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>
	
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
	              <li><a href="webshop.php">Online prodavnica</a></li>
                  <li><a href="Tutorijali.php">Tutorijali</a></li>
	              <li><a href="profil.php">Moj Profil</a></li>
	              <li><a href="log/logout.php">Izloguj se</a></li>
	            </ul>
	          </div>
	        </div>


	        <center><h3 style="color:#10AFAB;">Tutorijali</h3></center>
	        <center><div class="container" style="width:800px;">  
      
                <?php  
                $query = "SELECT * FROM knjige ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4" align="center">  
                     <form align="center" method="post" action="webshop.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <center><div style="width:800px; border:1.5px solid #333; background-color: #fff; border-radius:12px; padding:40px 50px; margin-right: 300px; box-shadow: 8px 8px 40px 1px #c2c2d6;">  
                              <center><EMBED SRC="video/<?php echo $row["demo"]; ?>" WIDTH="640" HEIGHT="380" autoplay=0></EMBED> </center>
                               
                               <h4 class="text-info" style="font: 1.3em; font-style: bold;"><?php echo $row["ime"]; ?></h4>  
                               <h4 class="text-info"> <?php echo $row["opis"]; ?></h4>  
                          </div>  
                          </center>
                          <br>
                     </form>  
                     <br>
                </div> 
                 
                <?php  
                     }  
                }  
                ?> 


		<div class="inner_containerbottom">
		  	<?php 
		    	include('footer.php');
		   	?>
	   </div>

   </div>
</body>
</html>