<?php
//ini_set('display_errors', 0);

//ini_set('display_startup_errors', 0);




include_once ("inc.lib.conexion.php");

$cnxODBC = establecerconexionODBC(); 


if (!isset($_GET["extension"])) {
    //exit();
}

$extension=$_GET["extension"];



	$sql = sprintf("SELECT *  FROM directorio_telefonico WHERE Extension='%s'",trim($extension));
    $stmt =  odbc_exec($cnxODBC, $sql );
  
//echo $sql;
   while($row = odbc_fetch_array($stmt)) {

        $extension = $row['Extension'];
        $dependencia = $row['Dependencia'];
        $cargo = $row['Cargo'];
        $nombre = $row['Nombre'];
       
        
  
 }
 //print_r($_GET);
 //print_r($_POST);
 // validación cuando se reciban datos a travez del metodo post
  if (isset($_POST["update"])){
  	$extension= $_POST['extension'];
  	$dependencia = $_POST['Dependencia'];
  	$cargo = $_POST['Cargo'];
    $nombre = $_POST['Nombre'];
    // $claveencrip = hash('sha1', $clave);
  
  	$query  = "UPDATE directorio_telefonico SET Extension='$extension', Dependencia='$dependencia', Cargo= '$cargo', Nombre= '$nombre' WHERE Extension='$extension'";
  	//echo $query; exit();
  	$stmt = odbc_exec($cnxODBC, $query );

  	if($stmt){

  	$_SESSION['message'] = 'Registro Actualizado Exitosamente';
    $_SESSION['message_type'] = 'primary';
     header("Location: inc.directorio.php");
  }else{
  	
   }
   
  }
  //exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EDITAR DIRECTORIO</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="DataTables/datatables.min.css" >
    <link rel="stylesheet" href="DataTables/DataTables-1.10.23/dataTables.bootstrap.min.css" >
    <link href="-free-5.15/font-awesome.min.cs" rel="stylesheet"> 
</head>
<body>

<!-- NAVBAR-->
<!-- Just an image -->

  <br>
  <br>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
		<div class="card border-info mb-3" style="max-width: 18rem;">

	    <div class="card-header">Editar Datos</div>

		<div class="card card-body">
			<!-- <form action="edit_directorio.php?extension=<?php echo $_GET['extension']; ?>" method="POST">  -->
<form name="tasa" id="tasa" action="edit_directorio.php" method="post">
        <!-- envio los datos  a mi misma ruta para para poder editar y son enviados por post con el id correspondiente optenidos del parametro id-->
				<div class="form-group">
					<input type="text" name="extension" value="<?php echo $extension; ?>" class="form-control" placeholder="Actualizar extension">
					
				</div><br>			
				

				<div class="form-group">
					<input type="text" name="Dependencia" value="<?php echo $dependencia; ?>" class="form-control" placeholder="Actualizar Dependencia">
					
				</div><br>
        <div class="form-group">
          <input type="text" name="Cargo" value="<?php echo $cargo; ?>" class="form-control" placeholder="Actualizar Cargo">
          
        </div><br>
        <div class="form-group">
          <input type="text" name="Nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar Nombre">
          
        </div><br>

				

<center><button class="btn btn-success" name="update" value="update">
					Actualizar
				</button></center>
				
			</form>
			
		</div>
		
		
	</div>
	<center>
	<button class="btn btn-Dark" name="back" onclick="window.location='inc.directorio.php'"><i class="fas fa-arrow-circle-left"></i>
					Regresar
				</button>
				</center>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js" ></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js" ></script>
<script type="text/javascript" src="js/validar.js"></script>


<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script type="text/javascript" src="DataTables/Buttons-1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.6.5/js/buttons.html5.min.js"></script>

<script type="text/javascript" src="main.js"></script>
<script defer src="fontawesome-free-5.15.1-web/js/all.js"></script> 



<script src="js/vue.js"></script> 
<script src="js/vue-router.js"></script> 
<script src="js/config.js"></script>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


</body>