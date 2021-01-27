<?php

include("../db_connect.php");

class model_editvidproj{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function getVideoDB($id, $projID){

		global $conn;

		$stm = $conn->prepare("SELECT vid_title, vid_text, vid_link FROM vidproject WHERE vid_id = ? AND vid_proj_id = ?");
		$stm->bind_param('ii', $id, $projID);

		return $stm;

	}

	function editVideoDB($name, $link, $id, $projID, $text){

		global $conn;

		$stm = $conn->prepare("UPDATE vidproject SET vid_title=?, vid_text=?, vid_link=? WHERE vid_id=? AND vid_proj_id=?");

		
		$stm->bind_param('sssii', $name, $text, $link, $id, $projID);
					
		return $stm;

	}

}

?>