<?php

include("../db_connect.php");

class model_addvidproj{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function addProjDB($name, $link, $text, $id){

		global $conn;
		
		$stm = $conn->prepare("INSERT INTO vidproject (vid_proj_id, vid_title, vid_text, vid_link, vid_datetime, vid_status) VALUES (?, ?, ?, ?, ?, ?)");

		$zero = 0;
		$date = date('Y-m-d H:i:s');
		$stm->bind_param('issssi', $id, $name, $text, $link, $date, $zero);
					
		return $stm;

	}

}

?>