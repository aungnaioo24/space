<?php

session_start();

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true){
  header("location: http://localhost/space/admin/welcome.php");
  exit;
}

include("ctrl_delvidproj.php");

$id = $_GET['id'];
$projID = $_GET['projID'];

$controller = new ctrl_delvidproj();
$controller->delVideo($id, $projID);

?>