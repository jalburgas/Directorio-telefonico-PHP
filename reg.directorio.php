<?php


include_once ("inc.lib.conexion.php");

$cnxODBC = establecerconexionODBC(); // conexion a la BD

$MSG_ERROR['MSG_BOTON'] = "Regresar";
$MSG_ERROR['TIPO_BOTON']= ERROR_BOTON_ATRAS;

$extencion   = $_POST['EXTENCION'];
$departamento   = $_POST['DEPARTAMENTO'];
$cargo   = $_POST['CARGO'];
$nombre   = $_POST['NOMBRE'];

$PAG_SIGUIENTE = $_POST['PS'];
$usuario       = $_POST['USUARIO'];

function agregardirectorio($departamento,$cargo,$nombre,$extencion) {
	global $cnxODBC;
$MSG_ERROR['MSG_BOTON'] = "Regresar";
$MSG_ERROR['TIPO_BOTON']= ERROR_BOTON_ATRAS;

	
	$LISTO=0;
	
	$cadSQL = sprintf("EXEC wIns_directorio  @departamento= '%s', @cargo= '%s', @nombre = '%s', @extencion='%s' ",
			$departamento,				
			$cargo,
			$nombre,			
			$extencion			
		);
//echo $cadSQL;
	$consulta = odbc_exec($cnxODBC, $cadSQL);
	if (!(is_resource($consulta) || $consulta) ) {
		$cad_msg = odbc_errormsg();
		if ($cad_msg != '') { 
			$MSG_ERROR['CONTENIDO'] .= '<br>  Por favor indique el siguiente mensaje al administrador: <strong>'.$cad_msg.'</strong>';
			$MSG_ERROR['MSG_BOTON'] = "Regresar";
		 }
		
		include("inc.error.msg.php");
		exit();
	}else return 1;

	odbc_free_result($consulta);
}			
			agregardirectorio($departamento,$cargo,$nombre,$extencion);
			echo "string";
			$LISTO = 1;   
  
if ($LISTO = 1){
header("Location: inc.directorio.php");
//exit();
}
?>