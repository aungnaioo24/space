<?php
	
class db_connect{

	function __construct(){

		$servername = "localhost";
		$username = "root";
		$password = "";

		global $conn;

		//create connection
		$conn = mysqli_connect($servername, $username, $password);

		//check
		if(!$conn){
			die("Connection failed: ".mysqli_connect_error());
		}
		
		mysqli_select_db($conn, "spacebykm");

	}

	function getConn(){
		global $conn;

		return $conn;
	}

}

?>