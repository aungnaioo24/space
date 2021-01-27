<?php

include("model_delprojs.php");

class ctrl_delprojs {

	function __construct(){

		global $model;
		$model = new model_delprojs();

	}

	function delOneProjs($id){

		global $model;

		$stm = $model->delOneProjsDB($id);

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