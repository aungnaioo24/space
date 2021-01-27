<?php

include("../db_connect.php");

class model_editprojs{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function getOneProjsDB($id){

		global $conn;

		$stm = $conn->prepare("SELECT projs_name, projs_photo FROM projects WHERE projs_id = ?");
		$stm->bind_param('i', $id);

		return $stm;

	}

	function editProjsDB($name, $photo, $id){

		global $conn;

		if($photo['size']>0){
			$extensions = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF');
			$ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
			$location = $_SERVER['DOCUMENT_ROOT'].'/space/images/projects/'.$photo['name'];

			if(in_array($ext, $extensions)){
				if(!file_exists($location)){
					move_uploaded_file($photo['tmp'], $location);
					$picname = $photo['name'];

					$stm = $conn->prepare("UPDATE projects SET projs_name=?, projs_photo=? WHERE projs_id=?");

					//$zero = 0;
					//$date = date('Y-m-d H:i:s');
					$stm->bind_param('ssi', $name, $picname, $id);
					
					return $stm;
				}else{
					$newpicname = time().'-'.$photo['name'];
					$newlocation = $_SERVER['DOCUMENT_ROOT'].'/space/images/projects/'.$newpicname;

					move_uploaded_file($photo['tmp'], $newlocation);

					$stm = $conn->prepare("UPDATE projects SET projs_name=?, projs_photo=? WHERE projs_id=?");

					//$zero = 0;
					//$date = date('Y-m-d H:i:s');
					$stm->bind_param('ssi', $name, $newpicname, $id);

					return $stm;
				}

			}else{
				return 'fail';
			}

		}

	}

}

?>