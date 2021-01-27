<?php

session_start();

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true){
  header("location: http://localhost/space/admin/welcome.php");
  exit;
}

include("../ctrl_projects.php");
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
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <a class="navbar-brand" href="http://localhost/space/admin">SPACE (Admin)</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="editpass.php">Edit Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid projDiv adminProjDiv" id="projDiv">
      <div class="row">
        <h2 class="title">Projects (Admin)</h2>
      </div>
      <a class="btn btn-info" href="addprojs.php">Add Project</a>
      <div class="imagesDiv">
          <?php

         $controller = new ctrl_projects();
         $stm = $controller->getProjects();

        // to fetch data

          $stm->bind_result($id, $name, $photo);
          while($stm->fetch()){
         ?>
        
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6 imgDiv">
            <div class="adminImg">
              <a class="btn btn-success" style="font-size: 22px;" href="project.php?id=<?php echo $id; ?>"><?php echo $name; ?></a>
            </div>
            <img src="../images/projects/<?php echo $photo; ?>" class="rounded">
            <br>
            <a class="btn btn-warning" href="editprojs.php?id=<?php echo $id; ?>">Edit</a>
            <a class="btn btn-danger" href="delprojs.php?id=<?php echo $id; ?>">Delete</a>
          </div><br>
        </div>
        <br>
        <?php } ?>
      </div>
    </div>
    <div class="footerr">
      <p>Powered by Droplet</p>
    </div>
  </body>
</html>
