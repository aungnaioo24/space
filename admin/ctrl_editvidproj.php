<?php

include("model_editvidproj.php");		

class ctrl_editvidproj {

	function __construct(){

		global $model;
		$model = new model_editvidproj();

	}

	function getVideo($id, $projID){

		global $model;

		$stm = $model->getVideoDB($id, $projID);
		$stm->execute();
		$stm->store_result();

		return $stm;

	}


	function editVideo($name, $link, $id, $projID, $text){

		global $model;

		$stm = $model->editVideoDB($name, $link, $id, $projID, $text);

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