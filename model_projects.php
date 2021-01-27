<?php

include("db_connect.php");

class model_projects{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function getProjectsDB(){

		global $conn;
		
		$stm = $conn->prepare("SELECT projs_id, projs_name, projs_photo FROM projects WHERE projs_status=? ORDER BY projs_datetime DESC");

		return $stm;

	}

}

?>