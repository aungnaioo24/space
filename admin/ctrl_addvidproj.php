<?php

include("model_addvidproj.php");		

class ctrl_addvidproj {

	function __construct(){

		global $model;
		$model = new model_addvidproj();

	}

	function addProj($name, $link, $text, $id){

		global $model;

		$stm = $model->addProjDB($name, $link, $text, $id);

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