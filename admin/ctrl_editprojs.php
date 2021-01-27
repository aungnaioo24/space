<?php

include("model_editprojs.php");		

class ctrl_editprojs {

	function __construct(){

		global $model;
		$model = new model_editprojs();

	}

	function getOneProjs($id){

		global $model;

		$stm = $model->getOneProjsDB($id);
		$stm->execute();
		$stm->store_result();

		return $stm;

	}


	function editProjs($name, $photo, $id){

		global $model;

		$stm = $model->editProjsDB($name, $photo, $id);

		if($stm != 'fail'){
			$result = $stm->execute();
			//$stm->store_result();

			if($result>0){
				header("location: http://localhost/space/admin");
			}

		}else{
			echo "File type error!";
		}

	}

}

?>