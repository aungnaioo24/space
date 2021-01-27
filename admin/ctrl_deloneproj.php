<?php

include("model_deloneproj.php");

class ctrl_deloneproj {

	function __construct(){

		global $model;
		$model = new model_deloneproj();

	}

	function delOneProj($id, $projID){

		global $model;

		$stm = $model->delOneProjDB($id, $projID);

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