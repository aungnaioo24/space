<?php

include("model_project.php");		

class ctrl_project {

	function __construct(){

		global $model;
		$model = new model_project();

	}

	function getProjectItems($id){

		global $model;

		$stm = $model->getProjectItemsDB();

		$zero = 0;
		$stm->bind_param('dd', $zero, $id);
		$stm->execute();
		$stm->store_result();

		return $stm;

	}

	function getVideo($id){

		global $model;

		$stm = $model->getVideoDB();

		$zero = 0;
		$stm->bind_param('dd', $zero, $id);
		$stm->execute();
		$stm->store_result();

		return $stm;

	}

}

?>