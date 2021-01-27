<?php

include("../db_connect.php");

class model_welcome{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function loginDB($name, $pass){

		global $conn;
		
		$sql = "SELECT name, pass FROM admin";
		$result = mysqli_query($conn, $sql);

		return $result;
	}

}

?>