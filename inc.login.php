<?php 
//print_r($_POST);
session_start();
if (isset($_POST['USUARIO'])) {$_SESSION['USUARIO'] = $_POST['USUARIO'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body >
   <div class="p-3 mb-2 bg-warning text-white">  </div> 
<?php if (isset($_SESSION['message'])) { ?> <!-- variable de session php -->

<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
  <?= $_SESSION['message'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  <?php // session_unset();
   } ?> 
  <br>
    <center>
    
<div class="card border-primary mb-3"  style="width: 10rem;">
  <center><img src="imagenes/LOGO .png" style="width: 5rem;"> </center>
  <div class="card-body">
    
  <form action="passwd.php" method="POST">
  <div class="mb-3">
  
    <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
    <input type="text" class="form-control border-primary mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" name="USUARIO">
   
    
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Clave</label>
    <input type="password" class="form-control border-primary mb-3" id="exampleInputPassword1" name="clave">
  </div>
  <div class="mb-3">
    
    <!-- <input type="hidden" class="form-control border-primary mb-3" id="institucion" name="institucion" value="2">
    <input type="hidden" class="form-control border-primary mb-3" id="sede" name="sede" value="1"> -->
  </div>
   <!-- <button type="button" class="btn btn-primary" onclick="window.location='principal.php'">Enviar</button> -->
   <button type="submit" class="btn btn-primary" >Enviar</button>

</form>
  </div>
</div>
 
  <div class="card text-white bg-primary mb-3" style="max-width: 70rem;">
  <div class="card-header bg-danger"><h5></h5></div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">Directorio Telefonico</p>
  </div>
</div>
</center>

</body>
</html>
   





