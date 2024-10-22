<?php

include_once ("inc.lib.conexion.php");
$cnxODBC = establecerconexionODBC(); 

//print_r($_POST);
print_r($_GET);

 // validación cuando se reciban datos a travez del metodo GET
  if (isset($_GET["extension"])){
  	$extension= $_GET['extension'];
  	$dependencia = $GET['Dependencia'];
  	$cargo = $_GET['Cargo'];
    $nombre = $_GET['Nombre'];
    // $claveencrip = hash('sha1', $clave);
  
  	$query  = "DELETE  directorio_telefonico  WHERE Extension='$extension'";
  	//echo $query; exit();
  	$stmt = odbc_exec($cnxODBC, $query );

  	if($stmt){

  	$_SESSION['message'] = 'Registro Eliminado';
    $_SESSION['message_type'] = 'primary';
     header("Location: inc.directorio.php");
  }else{
  	
   }
  }
