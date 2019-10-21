<?php
session_start();
  header('Content-Type: text/html; charset=utf-8');
  //phpinfo();
  if (!isset($_SESSION['username']))
{
    header("Location: login.php");
    die();
}
?>

<?php 
require 'dbconfig/configkviz.php';
if(!empty($_SESSION['username'])){

    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 

   $keys=array_keys($_POST);
   $order=join(",",$keys);

   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;

   $response=mysqli_query($con,"select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysql_error());

   while($result=mysqli_fetch_array($response)){
       if($result['answer']==$_POST[$result['id']]){
               $right_answer++;
           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
   }
   /*$scoreid = $_SESSION['id'];*/
   $name=$_SESSION['username'];  //ubaci u highscores!!!
   /*mysqli_query($con,"update highscores set score='$right_answer' where id='$scoreid'");*/
    $scor = $right_answer*20-$wrong_answer*10-$unanswered*5;
    $userid =  $_SESSION['userid'];
    $category =  $_SESSION['category'];
   mysqli_query($con,"INSERT INTO highscore (user_id,score,category_id)VALUES ('$userid','$scor','$category')") or die(mysql_error());
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rezultati</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/meni.css">
        <script type="text/javascript" src="js/meni.js"></script> 

    </head>
    <body background="imgs/11.jpg" style="background-attachment: fixed; background-repeat: no-repeat;">
    <div id="main-wrapper1" style="width: 900px; background-color: white; border: 3px solid #f1f1f1; border-radius : 10px; margin: 0 auto;">
     <div id="sse1">
            <div id="sses1">
              <ul>
                <li><a href="index.php">Igre</a></li>
                <li><a href="rang.php">Rang lista</a></li>
                <li><a href="webshop.php">Online  prodavnica</a></li>
                <li><a href="Tutorijali.php">Tutorijali</a></li>
                <li><a href="profil.php">Moj Profil</a></li>
                <li><a href="log/logout.php">Izloguj se</a></li>
              </ul>
            </div>
          </div>
        
        <div class="container result">
            <div class="row" class="col-xs-24 col-sm-12 col-lg-12"> 
                    <center><img src="imgs/owl6.jpg" class="img-responsive"/>
                        </center>
                            
           </div>  
           <hr>   
           <div class="row"> 
                  <div class="col-xs-12 col-sm-6 col-lg-6"> 
                    <!--<div class='result-logo1'>-->
                    
                      <img src="imgs/owl4.jpg" class="img-responsive"/>
                    
                    </div>
                  

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-bottom: 20%;"> 
                  <br>
                  <br>
                  <br>
                  <br>

                       <center><div style="border:1.5px solid #333; background-color: #fff; border-radius:10px; padding:3px 8px; margin: 6px; box-shadow: 8px 8px 40px 1px #c2c2d6; margin-right: 10%;">
                       <br> 
                       <p style="color:DarkSlateBlue;">Tačnih odgovora: <span class="answer"><?php echo $right_answer;?></span></p>
                        <p>Pogrešnih odgovora: <span class="answer"><?php echo $wrong_answer;?></span></p>
                        <p>Neodgovorenih pitanja: <span class="answer"><?php echo $unanswered;?></span></p>                   
                        </div></center>
                       
                     <br><br>
                      <center> <a style="color:white;" href="<?php echo 'index.php'?>" class='btn btn-success'>Novi kviz</a>                   
                    <a style="color:white;" href="<?php echo 'rang.php';?>" class='btn btn-success'>Rang lista</a></center>
                     

                   </div>

            </div>    
            <div class="row">    

            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/jquery.validate.min.js"></script>
</div>
    </body>
</html>
<?php }else{

 header( 'Location: http://localhost/projekat/index.php' ) ;

}?>