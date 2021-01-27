<?php

include("../db_connect.php");

class model_delprojs{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function delOneProjsDB($id){

		global $conn;

		$one = 1;
		$stm = $conn->prepare("UPDATE projects SET projs_status=? WHERE projs_id=?");

		//$zero = 0;
		//$date = date('Y-m-d H:i:s');
		$stm->bind_param('ii', $one, $id);
					
		return $stm;

	}

}

?>