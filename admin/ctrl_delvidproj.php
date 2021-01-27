<?php

include("model_delvidproj.php");

class ctrl_delvidproj {

	function __construct(){

		global $model;
		$model = new model_delvidproj();

	}

	function delVideo($id, $projID){

		global $model;

		$stm = $model->delVideoDB($id, $projID);

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