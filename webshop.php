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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Web shop</title>
	<link rel="stylesheet" href="css/meni.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
	<script type="text/javascript" src="/path/to/jquery-latest.js"></script> 
	<script type="text/javascript" src="js/meni.js"></script> 
  <script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>

	
</head>
<body class="" background="imgs/11.jpg" style="background-attachment: fixed; background-repeat: no-repeat;">
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


	        <center><h3 style="color:#10AFAB;">Online prodavnica</h3></center>
	        <center><div class="container" style="width:550px;">  
      
                <?php  
                $query = "SELECT * FROM knjige ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4"> 
                
                     <form method="post" action="webshop.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1.5px solid #333; background-color: #fff; border-radius:10px; padding:20px 15px; margin: 12px; box-shadow: 8px 8px 40px 1px #c2c2d6 ;" align="center">  
                              <center><img src="imgs/<?php echo $row["slika"]; ?>" class="img-responsive" /></center>  
                               <h2 class="text-info" style="font: 1.3em; font-style: bold;"><?php echo $row["ime"]; ?></h2>  
                               <h4 class="text-danger">€ <?php echo $row["cena"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" style="border: 1px solid #333;border-radius: 2px; width: 100px; height: 30px;" value="1" />  
                               <input type="hidden" name="hidden_name"  value="<?php echo $row["ime"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["cena"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px; border: 1px solid #333;border-radius: 2px; width: 100px; height: 30px; background-color: white;" class="btnbtn-success" value="Dodaj u korpu" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3 style="color:#10AFAB;">Detalji o narudžbini</h3>  
                <div class="table-responsive">  
                 <center><table class="table table-bordered">  
                          <tr>  
                               <th width="25%" align="left">Naziv</th>  
                               <th width="25%" align="left">Količina</th>  
                               <th width="20%" align="left">Cena</th>  
                               <th width="25%" align="left">Ukupno</th>  
                               <th width="20%" align="left">Ukloni</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td align="left"><?php echo $values["item_name"]; ?></td>
                               <td align="center"><?php echo $values["item_quantity"]; ?></td>   
                               <td align="left">$ <?php echo $values["item_price"]; ?></td>  
                               <td align="left">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                               <td align="left"><a href="webshop.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Ukloni</span></a></td>   
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="left">Ukupno</td>  
                               <td align="left">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table> </center>     
                </div>
                </center>




                <div class="konvertor">
               <center><h3 style="color:#10AFAB">Konvertuj u odgovarajuću valutu</h3></center> 

                <form method="post" id="currency-form">     
                  <center><div class="form-group">
                    <label>Iz</label>
                      <select name="from_currency" style="border: 1px solid #333;border-radius: 2px; width: 100px; height: 30px;">
                        <option value="USD">Američki dolar</option>
                        <option value="AUD">Australijski dolar</option>
                        <option value="EUR" selected="1">Evro</option>
                        <option value="RSD">Srpski dinar</option>
                        <option value="CNY">Kineski jen</option>
                      </select> 
                            
                      <label>u </label>
                      <select name="to_currency" style="border: 1px solid #333;border-radius: 2px; width: 100px; height: 30px;">
                        <option value="RSD">Srpski dinar</option>
                        <option value="USD" selected="1">Američki dolar</option>
                        <option value="AUD">Australijski dolar</option>
                        <option value="EUR">Evro</option>
                        <option value="CNY">Kineski jen</option>
                      </select> 
                      <label>Iznos</label> 
                      <input type="text" placeholder="iznos" name="amount" id="amount" style="border: 1px solid #333;border-radius: 2px; width: 100px; height: 30px;" />    
                      <button type="submit" name="convert" id="convert" class="btn btn-default" style="margin-top:5px; border: 1px solid #333;border-radius: 2px; width: 100px; height: 30px; background-color: white;" >Konvertuj</button> 
                        
                    </div></center></br>         
              </form> 
              
                    <center><div class="form-group" id="converted_rate"> </div>  </center>
                    <center><div id="converted_amount"> </div></center> </br> 
                </div>  

                






		<div class="inner_containerbottom">
		  	<?php 
		    	include('footer.php');
		   	?>
	   </div>

   </div>
</body>
</html>