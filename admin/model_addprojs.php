<?php

include("../db_connect.php");

class model_addprojs{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function addProjsDB($name, $photo){

		global $conn;

		if($photo['size']>0){
			$extensions = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF');
			$ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
			$location = $_SERVER['DOCUMENT_ROOT'].'/space/images/projects/'.$photo['name'];

			if(in_array($ext, $extensions)){
				if(!file_exists($location)){
					move_uploaded_file($photo['tmp'], $location);
					$picname = $photo['name'];

					$stm = $conn->prepare("INSERT INTO projects (projs_name, projs_photo, projs_datetime, projs_status) VALUES (?, ?, ?, ?)");

					$zero = 0;
					$date = date('Y-m-d H:i:s');
					$stm->bind_param('sssi', $name, $picname, $date, $zero);
					
					return $stm;
				}else{
					$newpicname = time().'-'.$photo['name'];
					$newlocation = $_SERVER['DOCUMENT_ROOT'].'/space/images/projects/'.$newpicname;

					move_uploaded_file($photo['tmp'], $newlocation);

					$stm = $conn->prepare("INSERT INTO projects (projs_name, projs_photo, projs_datetime, projs_status) VALUES (?, ?, ?, ?)");

					$zero = 0;
					$date = date('Y-m-d H:i:s');
					$stm->bind_param('sssi', $name, $newpicname, $date, $zero);

					return $stm;
				}

			}else{
				return 'fail';
			}

		}

	}

}

?>