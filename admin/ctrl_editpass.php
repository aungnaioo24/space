<?php

include("model_editpass.php");		

class ctrl_editpass {

	function __construct(){

		global $model;
		$model = new model_editpass();
	}

	function edit($name, $pass){

		global $model;

		$stm = $model->editDB($name, $pass);

		$result = $stm->execute();
			//$stm->store_result();

		if($result>0){
			header("location: http://localhost/space/admin/logout.php");
		}

	}

}

?>