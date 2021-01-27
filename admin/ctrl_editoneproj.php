<?php

include("model_editoneproj.php");		

class ctrl_editoneproj {

	function __construct(){

		global $model;
		$model = new model_editoneproj();

	}

	function getOneProj($id, $projID){

		global $model;

		$stm = $model->getOneProjDB($id, $projID);
		$stm->execute();
		$stm->store_result();

		return $stm;

	}


	function editProj($name, $photo, $id, $projID, $text){

		global $model;

		$stm = $model->editProjDB($name, $photo, $id, $projID, $text);

		if($stm != 'fail'){
			$result = $stm->execute();
			//$stm->store_result();

			if($result>0){
				return;
			}

		}else{
			echo "File type error!";
		}

	}

}

?>