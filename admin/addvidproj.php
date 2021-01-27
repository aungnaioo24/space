<?php

session_start();

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true){
  header("location: http://localhost/space/admin/welcome.php");
  exit;
}

include("ctrl_addvidproj.php");

$id = $_GET['id'];

if(isset($_POST['addprjs'])){
  
  $name = $_POST['pname'];
  $text = $_POST['text'];
  $link = $_POST['link'];

  $controller = new ctrl_addvidproj();
  $controller->addProj($name, $link, $text, $id);

  //echo $id.$name.$text.$link;

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SPACE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>
  <body style="background: black;">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <a class="navbar-brand" href="http://localhost/space/admin">SPACE (Admin)</a>
    </nav>
    <div class="container-fluid projDiv" id="projDiv" style="background: linear-gradient(to right, black, #200033, #de00d6);">
      <div class="row">
        <h2 class="title">Add Video Project (Admin)</h2>
      </div>
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <form class="was-validated addprojs" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="pname">Project Title: </label>
              <input type="text" class="form-control" id="pname" placeholder="Enter project name" name="pname" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="text">Text: </label>
              <textarea class="form-control" rows="3" id="text" placeholder="Enter Text" name="text" required></textarea>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="link">Video Link: </label>
              <input type="text" class="form-control" id="link" placeholder="Enter project name" name="link" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <input type="submit" class="btn btn-primary" value="Add Video Project" name="addprjs">
          </form>
        </div>
      </div>
    </div>
    <div class="footerr">
      <p>Powered by Droplet</p>
    </div>
  </body>
</html>
