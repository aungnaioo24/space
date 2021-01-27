<?php

include("model_addprojs.php");		

class ctrl_addprojs {

	function __construct(){

		global $model;
		$model = new model_addprojs();

	}

	function addProjs($name, $photo){

		global $model;

		$stm = $model->addProjsDB($name, $photo);

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