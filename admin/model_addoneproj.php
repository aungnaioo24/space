<?php

include("../db_connect.php");

class model_addoneproj{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function addProjDB($name, $photo, $text, $id){

		global $conn;

		if($photo['size']>0){
			$extensions = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF');
			$ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
			$location = $_SERVER['DOCUMENT_ROOT'].'/space/images/proj_photos/'.$photo['name'];

			if(in_array($ext, $extensions)){
				if(!file_exists($location)){
					move_uploaded_file($photo['tmp'], $location);
					$picname = $photo['name'];

					$stm = $conn->prepare("INSERT INTO picproject (pic_projs_id, pic_title, pic_text, pic_photo, pic_datetime, pic_status) VALUES (?, ?, ?, ?, ?, ?)");

					$zero = 0;
					$date = date('Y-m-d H:i:s');
					$stm->bind_param('issssi', $id, $name, $text, $picname, $date, $zero);
					
					return $stm;
				}else{
					$newpicname = time().'-'.$photo['name'];
					$newlocation = $_SERVER['DOCUMENT_ROOT'].'/space/images/proj_photos/'.$newpicname;

					move_uploaded_file($photo['tmp'], $newlocation);

					$stm = $conn->prepare("INSERT INTO picproject (pic_projs_id, pic_title, pic_text, pic_photo, pic_datetime, pic_status) VALUES (?, ?, ?, ?, ?, ?)");

					$zero = 0;
					$date = date('Y-m-d H:i:s');
					$stm->bind_param('issssi', $id, $name, $text, $newpicname, $date, $zero);

					return $stm;
				}

			}else{
				return 'fail';
			}

		}

	}

}

?>