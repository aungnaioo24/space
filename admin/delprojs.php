<?php

session_start();

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true){
  header("location: http://localhost/space/admin/welcome.php");
  exit;
}

include("ctrl_delprojs.php");

$id = $_GET['id'];

$controller = new ctrl_delprojs();
$controller->delOneProjs($id);

?>