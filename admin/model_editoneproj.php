<?php

include("../db_connect.php");

class model_editoneproj{

	function __construct(){

		global $conn;
		$db = new db_connect();
		$conn = $db->getConn();

	}

	function getOneProjDB($id, $projID){

		global $conn;

		$stm = $conn->prepare("SELECT pic_title, pic_text, pic_photo FROM picproject WHERE pic_id = ? AND pic_projs_id = ?");
		$stm->bind_param('ii', $id, $projID);

		return $stm;

	}

	function editProjDB($name, $photo, $id, $projID, $text){

		global $conn;

		if($photo['size']>0){
			$extensions = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF');
			$ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
			$location = $_SERVER['DOCUMENT_ROOT'].'/space/images/proj_photos/'.$photo['name'];

			if(in_array($ext, $extensions)){
				if(!file_exists($location)){
					move_uploaded_file($photo['tmp'], $location);
					$picname = $photo['name'];

					$stm = $conn->prepare("UPDATE picproject SET pic_title=?, pic_text, pic_photo=? WHERE pic_id=? AND pic_projs_id=?");

					//$zero = 0;
					//$date = date('Y-m-d H:i:s');
					$stm->bind_param('sssii', $name, $text, $picname, $id, $projID);
					
					return $stm;
				}else{
					$newpicname = time().'-'.$photo['name'];
					$newlocation = $_SERVER['DOCUMENT_ROOT'].'/space/images/proj_photos/'.$newpicname;

					move_uploaded_file($photo['tmp'], $newlocation);

					$stm = $conn->prepare("UPDATE picproject SET pic_title=?, pic_text=?, pic_photo=? WHERE pic_id=? AND pic_projs_id=?");

					//$zero = 0;
					//$date = date('Y-m-d H:i:s');
					$stm->bind_param('sssii', $name, $text, $newpicname, $id, $projID);

					return $stm;
				}

			}else{
				return 'fail';
			}

		}

	}

}

?>