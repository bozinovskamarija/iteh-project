<?php
require_once("SimpleRest.php");
require_once("Book.php");
		
class BookRestHandler extends SimpleRest {

	function getAllBooks() {	

		$book = new Book();
		$rawData = $book->getAllBook(); /*books?*/

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["output"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function add() {	
		$book = new Book();
		$rawData = $book->addBook();
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function deleteBookById() {	
		$book = new Book();
		$rawData = $book->deleteBook();
		
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	
	function editBookByName() {	
		$book = new Book();
		$rawData = $book->editBook();
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);	
			
		} else {
			$statusCode = 200;
			
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
}
?>