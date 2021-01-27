<?php

include("../db_connect.php");

class model_delvidproj{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function delVideoDB($id, $projID){

		global $conn;

		$one = 1;
		$stm = $conn->prepare("UPDATE vidproject SET vid_status=? WHERE vid_id=? AND vid_proj_id=?");

		$stm->bind_param('iii', $one, $id, $projID);
					
		return $stm;

	}

}

?>