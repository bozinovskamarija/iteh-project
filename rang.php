<?php 
include 'demo2.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/meni.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
	<script type="text/javascript" src="/path/to/jquery-latest.js"></script> 
	<script type="text/javascript" src="js/meni.js"></script> 
	<script src="DataTables-1.10.16/media/js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="DataTables-1.10.16/media/css/jquery.dataTables.min.css" />
	<script src="DataTables-1.10.16/media/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="DataTables-1.10.16/extensions/Plugins/integration/jqueryui/dataTables.jqueryui.js"></script>
	<link rel="stylesheet" type="text/css" href=
		"DataTables-1.10.16/extensions/plugins/integration/jqueryui/dataTables.jqueryui.css">
	
	<link rel="stylesheet" type="text/css" href="jquery-ui-themes-1.12.1/themes/cupertino/jquery-ui.css">

	<script>
	$(document).ready(function(){
		$(".tabela").DataTable({
			 "language": {
	                "url": "DataTables-1.10.16/i18n/serbian.json"
	            }
		});
	});
</script>


<script>
	$(document).ready(function(){
		$("#datatable").DataTable({
	    "processing": true,
        "serverSide": true,
        "ajax": {
            url: 'demo2.php',
            type: 'POST'
        },
        "columns": [
            
            {"data": "username"},
            {"data": "score"},
            {"data": "category_name"},
        ],


    });
	});
	</script>


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

	        <table cellpadding="1" cellspacing="1" id="datatable" class="display" width="100%">
			<thead>
            <tr>
			
                <th>Korisnik</th>
                <th>Poeni</th>
                <th>Kategorija</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
				
                <th>Korisnik</th>
                <th>Poeni</th>
                <th>Kategorija</th>
            </tr>
        </tfoot>
	
			</table>



   </div>
</body>
</html>