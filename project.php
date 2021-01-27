<?php include("ctrl_project.php");
  
  $id = $_GET['id'];

  $controller = new ctrl_project();
  $stm = $controller->getProjectItems($id);

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SPACE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>
  <body style="background: black;">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <a class="navbar-brand" href="http://localhost/space">SPACE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/space/#projDiv">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/space/#servDiv">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
      </div>  
    </nav>
    <div class="container projDiv" id="projDiv">
      <div class="row">
        <h2 class="title">Projects</h2>
      </div>
      
      <?php

      $stm->bind_result($id, $title, $text, $photo);

      while($stm->fetch()){
      ?>

      <div class="row imagesDiv">
        <div class="col-sm-8">
          <br><br>
          <h2 style="color: white;"><?php echo $title ?></h2>
          <p style="margin-top: 20px; color: white;">
            <?php echo $text; ?>
          </p>
        </div><br><br>
        <div class="col-sm-4 imgDiv">
          <img src="images/proj_photos/<?php echo $photo ?>" class="rounded">
        </div>
      </div>

      <?php } ?>
    </div>
    <div class="footerr">
      <p>Powered by Droplet</p>
    </div>
  </body>
</html>
