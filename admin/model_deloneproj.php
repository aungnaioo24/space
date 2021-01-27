<?php

include("../db_connect.php");

class model_deloneproj{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function delOneProjDB($id, $projID){

		global $conn;

		$one = 1;
		$stm = $conn->prepare("UPDATE picproject SET pic_status=? WHERE pic_id=? AND pic_projs_id=?");

		//$zero = 0;
		//$date = date('Y-m-d H:i:s');
		$stm->bind_param('iii', $one, $id, $projID);
					
		return $stm;

	}

}

?>