<?php include("ctrl_projects.php"); ?>

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
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <a class="navbar-brand" href="http://localhost/space">SPACE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#projDiv">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#servDiv">Services</a>
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
    <div class="logopic">
      <img src="images/space.png">
    </div>
    <div class="container-fluid projDiv" id="projDiv">
      <div class="row">
        <h2 class="title">Projects</h2>
      </div>
      <div class="row imagesDiv">
        <?php

        $controller = new ctrl_projects();
        $stm = $controller->getProjects();

        // to fetch data

        $stm->bind_result($id, $name, $photo);
        while($stm->fetch()){
        ?>
        
        <div class="col-sm-4 imgDiv">
          <img src="images/projects/<?php echo $photo; ?>" class="rounded">
          <div class="focusImg">
            <a href="project.php?id=<?php echo $id; ?>"><?php echo $name; ?></a>
          </div>
        </div>

        <?php } ?>
      </div>
    </div>
     <div class="container-fluid servDiv" id="servDiv">
      <div class="row">
        <h2 class="title">Servics</h2>
      </div>
      <div class="row imagesDiv">
        <div class="col-sm-4 imgDiv">
          <img src="images/intime.png" class="rounded">
          <div class="focusImg">
            <a>Intime</a>
          </div>
        </div>
        <div class="col-sm-4 imgDiv">
          <img src="images/intime.png" class="rounded">
          <div class="focusImg">
            <a>Intime</a>
          </div>
        </div>
        <div class="col-sm-4 imgDiv">
          <img src="images/intime.png" class="rounded">
          <div class="focusImg">
            <a>Intime</a>
          </div>
        </div>
      </div>
    </div>
    <div class="footerr">
      <p>Powered by Droplet</p>
    </div>
  </body>
</html>
