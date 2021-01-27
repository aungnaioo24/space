<?php

include("../db_connect.php");

class model_editpass{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function editDB($name, $pass){

		global $conn;
		
		$id = 1;
		$stm = $conn->prepare("UPDATE admin SET name=?, pass=? WHERE id=?");
		
		$stm->bind_param('ssi', $name, $pass, $id);
					
		return $stm;
	}

}

?>