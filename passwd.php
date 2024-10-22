<?php

/*******************************************************/
//VALIDACION DEL USUARIO Y CLAVE CONTRA LA TABLA USUARIO J.A
/*******************************************************/
include_once ("inc.lib.conexion.php");
$cnxODBC = establecerconexionODBC();
//session_start();

if (isset($_POST['USUARIO'])) {$_SESSION['USUARIO']     = $_POST['USUARIO'];}
if (isset($_POST['clave']))   {$_SESSION['clave']     = $_POST['clave'];}
// if (isset($_POST['institucion']))   {$_SESSION['institucion']     = $_POST['institucion'];}
// if (isset($_POST['sede']))   {$_SESSION['sede']     = $_POST['sede'];}
$usuario   = $_POST["USUARIO"];
$clave   = $_POST["clave"];
// $institucion   = $_POST["institucion"];
// $sede   = $_POST["sede"];

/*print_r($_POST);*/ //print_r($_SESSION);echo $clave; exit();
function password( $usuario, $clave) {
  global $cnxODBC;

  $cadSQL=sprintf("exec wCons_password @usuario='%s', @clave='%s'",
  
              $usuario,
              $clave
             
            );

  //echo $cadSQL; exit();
    $consulta = odbc_exec($cnxODBC,$cadSQL);

    $fila = 0;
    $usuarios_ujap = array();
    
    if (is_resource($consulta)) {
      while (odbc_fetch_row($consulta)>0) {
        $usuarios_ujap[$fila++] = array('USUARIO'       => odbc_result($consulta,"usuario"),
                          
                                         'CLAVE'     => odbc_result($consulta,"clave"),
                                         'INSTITUCION'     => odbc_result($consulta,"institucion"),  
                                         'SEDE'     => odbc_result($consulta,"sede")  


                          
                        );
      } // FIN DEL WHILE
    } else { // error
      $MSG_ERROR['CONTENIDO']  .= '<br><font color="#FF0000"><b>'.msgerror_odbc($cnxODBC).'"Es probable que falte algun Dato"'.'</b></font>';
      include("../inc.error.msg.php");
       exit();
    }  //Fin del if-else
  odbc_free_result($consulta);
 // print_r($usuarios_ujap);
  return $usuarios_ujap; 
}
/*--------------------------------------------------------------------------------------------------------------------------*/
$auth = password( $usuario, $clave);
$_SESSION['INSTITUCION']=$auth[0]['INSTITUCION'];
$_SESSION['SEDE']=$auth[0]['SEDE'];
//print_r($_SESSION); 
//exit();
//$i=0;
//foreach($auth as $matriz) { 
//

if ((trim($auth[0]['USUARIO']) == trim($usuario)) && (trim($auth[0]['CLAVE']) == trim($clave) )){
    echo 'Ingreso';
    header("location:inc.directorio.php?USUARIO=".$usuario);
 //  $_SESSION['usuario'] = $usuario;

    }else{
     

     header("location:inc.login.php"); 
   
     echo 'Salida del sistema';

    //exit();

  
   } 
   if($usuario=="" && $clave==""){
   header("location:inc.login.php"); 
   
     echo 'Salida del sistema';
   }

//$i++;}


?>


