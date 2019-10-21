<?php
require_once("dbcontroller.php");


Class Book {
	private $books = array();
	public function getAllBook(){/*books?*/
		if(isset($_GET['name'])){
			$name = $_GET['name'];
			$query = 'SELECT * FROM users WHERE name LIKE "%' .$name. '%"';
		} else {
			$query = 'SELECT * FROM users';
		}
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
	}


	public function addBook(){
		if(isset($_POST['name'])){
			$name = $_POST['name'];
				$model = '';
				$color = '';
				$demo = '';
				$opis = '';
			if(isset($_POST['model'])){
				$model = $_POST['model'];
			}
			if(isset($_POST['color'])){
				$color = $_POST['color'];
			}
			if(isset($_POST['demo'])){
				$demo = $_POST['demo'];
			}	
			if(isset($_POST['opis'])){
				$opis = $_POST['opis'];
			}	
			$query = "insert into knjige (ime, slika, cena, demo, opis) values ('" . $name ."','". $model ."','" . $color ."','" . $demo ."','" . $opis ."')";
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			echo '<script type="text/javascript">alert("Knjiga je dodata!")</script>';
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function deleteBook(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'DELETE FROM knjige WHERE id = '.$id;
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	
	public function editBook(){
		if(isset($_POST['name'])){
			$name = $_POST['name'];
			$model = $_POST['model'];
			$color = $_POST['color'];
			$demo = $_POST['demo'];
			$opis = $_POST['opis'];
			$query = "UPDATE knjige SET slika ='". $model ."',cena = '". $color ."', demo = '". $demo ."', opis = '". $opis ."'  WHERE ime = '".$name."'";
			
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->executeQuery($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
			
		}
		
	}
	
}
?>