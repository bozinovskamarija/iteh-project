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
header('Content-Type: text/html; charset=utf-8');

require 'dbconfig/configkviz.php';
require 'dbconfig/config.php';
mysqli_set_charset($con,"utf8");

$category='';
    $username= $_SESSION['username'];
     $name=$_SESSION['username'];
     $category=$_POST['category'];

      
     $get = mysqli_query($con, "SELECT * FROM users WHERE username='$username' LIMIT 1");
     $rowid = mysqli_fetch_array($get, MYSQLI_BOTH);
     $userid= $rowid['userid']; 

      $_SESSION['category']=$category;
      $_SESSION['userid'] =$userid;
     
    /* $_SESSION['id'] = @mysql_insert_id();*/
 
$category=$_POST['category'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Kviz</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
<!--    <link href="css/btn.css" rel="stylesheet" media="screen">
    <link href="prvi.css" rel="stylesheet" media="screen">
    -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

    <script type="text/javascript" src="js/meni.js"></script>

    <link href="css/style.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/meni.css">
    <style>
      .container {
        margin-top: 110px;
      }
      .error {
        color: #B94A48;
      }
      .form-horizontal {
        margin-bottom: 0px;
      }
      .hide{display: none;}
    </style>

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
        
		<div class="container question">
        <center>
			<div style="border:1.5px solid #333;  border-radius:10px; padding:20px 15px; margin: 12px; box-shadow: 8px 8px 40px 1px #c2c2d6 ; width: 600px;">
				
				<form class="form-horizontal" role="form" id='login' method="post" action="result.php">
          <?php 
          $res = mysqli_query($con,"select * from questions where category_id=$category ORDER BY RAND()") or die(mysqli_error());
                    $rows = mysqli_num_rows($res);
          $i=1;
                while($result=mysqli_fetch_array($res)){?>
                    
                    
                    <?php if($i==1){?>         
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i ;?>"> <?php echo $i?>.<?php echo $result['question_name'];?></p>
                    
                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
                    <br/>
                    <button id='<?php echo $i;?>' class='next btn btn-success' type='button'>Sledeće pitanje ► </button>
                    </div>     
                      
                     <?php }elseif($i<1 || $i<$rows){?>
                     
                       <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question_name'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
                    <br/>
                    <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Prethodno ◄</button>                    
                    <button id='<?php echo $i;?>' class='next btn btn-success' type='button' > Sledeće ►</button>
                    </div>           
                        
                   <?php }elseif($i==$rows){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question_name'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
                    <br/>
                    
                    <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Prethodno ◄</button>                    
                    <button id='<?php echo $i;?>' class='next btn btn-success' type='submit'>Završi</button>
                    </div>
          <?php } $i++;} ?>
          
        </form>
			</div>
		</div>
       
<?php

if(isset($_POST[1])){ 
   $keys=array_keys($_POST);
   $order=join(",",$keys);

   $response=mysql_query("select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysql_error());
   $right_answer=0;
   $wrong_answer=0;
   $unanswered=0;
   while($result=mysql_fetch_array($response)){
       if($result['answer']==$_POST[$result['id']]){
               $right_answer++;
           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }


    $scor = $right_answer*20-$wrong_answer*10-$unanswered*5;

    mysqli_query($con,"INSERT INTO highscore (user_id,score,category_id)VALUES ('$userid','$scor','$category')") or die(mysql_error());

   }

   echo "right_answer : ". $right_answer."<br>";
   echo "wrong_answer : ". $wrong_answer."<br>";
   echo "unanswered : ". $unanswered."<br>";
}
?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>

		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');

		 $(document).on('click','.next',function(){
		     element=$(this).attr('id');
		     last = parseInt(element.substr(element.length - 1));
		     nex=last+1;
		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');
		 });

		 $(document).on('click','.previous',function(){
             element=$(this).attr('id');
             last = parseInt(element.substr(element.length - 1));
             pre=last-1;
             $('#question'+last).addClass('hide');

             $('#question'+pre).removeClass('hide');
         });
   
		</script>
    </div>
	</body>
</html>
