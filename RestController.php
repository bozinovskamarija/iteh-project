<?php
require_once("BookRestHandler.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";
if(isset($_GET["page_key"]))
	$page_key = $_GET["page_key"];
/*
controls the RESTful services
URL mapping
*/

	switch($page_key){

		case "list":
			// to handle REST Url /book/list/
			$bookRestHandler = new BookRestHandler();
			$result = $bookRestHandler->getAllBooks();
			break;
	
		case "create":
			// to handle REST Url /book/create/
			$bookRestHandler = new BookRestHandler();
			$bookRestHandler->add();
		break;
		
		case "delete":
			// to handle REST Url /book/delete/<row_id>
			$bookRestHandler = new BookRestHandler();
			$result = $bookRestHandler->deleteBookById();
		break;
		
		case "update":
			// to handle REST Url /book/update/<row_id>
			$bookRestHandler = new BookRestHandler();
			$bookRestHandler->editBookById();
		break;
}
?>
