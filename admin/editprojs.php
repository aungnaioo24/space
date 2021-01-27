<?php

session_start();

if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true){
  header("location: http://localhost/space/admin/welcome.php");
  exit;
}

include("ctrl_editprojs.php");
$id = $_GET['id'];

$controller = new ctrl_editprojs();

if(isset($_POST['editprjs'])){
  
  $name = $_POST['pname'];
  $pic_name = $_FILES['photo']['name'];
  $pic_tmp = $_FILES['photo']['tmp_name'];
  $pic_size = $_FILES['photo']['size'];
  $photo = array("name"=>$pic_name, "tmp"=>$pic_tmp, "size"=>$pic_size);

  //echo $pic_size;
  //echo $name;
  //include("ctrl_editprojs.php");

  //$controller = new ctrl_editprojs();
  $controller->editProjs($name, $photo, $id);

}

$stm = $controller->getOneProjs($id);
$stm->bind_result($name, $photo);
$stm->fetch();

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
        <h2 class="title">Edit Photo Project (Admin)</h2>
      </div>
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <form class="was-validated addprojs" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="pame">Project Name: </label>
              <input type="text" class="form-control" id="pname" placeholder="Enter project name" name="pname" value="<?php echo $name; ?>" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <img src="../images/projects/<?php echo $photo; ?>" class="rounded" style="width: 100%; padding: 10px;">
              <br><br>
              <label for="photo">Photo: </label>
              <input type="file" id="photo" name="photo" style="color: white" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <input type="submit" class="btn btn-primary" value="Edit Project" name="editprjs">
          </form>
        </div>
      </div>
    </div>
    <div class="footerr">
      <p>Powered by Droplet</p>
    </div>
  </body>
</html>
