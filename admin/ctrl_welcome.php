<?php

include("model_welcome.php");		

class ctrl_welcome {

	function __construct(){

		global $model;
		$model = new model_welcome();
	}

	function login($name, $pass){

		global $model;

		$result = $model->loginDB($name, $pass);

		if(mysqli_num_rows($result)>0){

			$data = mysqli_fetch_assoc($result);

			$cname = $data["name"];
			$cpass = $data["pass"];

			if($name == $cname){
				$_SESSION['admin'] = true;
				header("location: http://localhost/space/admin/index.php");
			}else{
				echo "Wrong Password";
			}

		}

	}

}

?>