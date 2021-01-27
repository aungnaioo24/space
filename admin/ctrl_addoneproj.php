<?php

include("model_addoneproj.php");		

class ctrl_addoneproj {

	function __construct(){

		global $model;
		$model = new model_addoneproj();

	}

	function addProj($name, $photo, $text, $id){

		global $model;

		$stm = $model->addProjDB($name, $photo, $text, $id);

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