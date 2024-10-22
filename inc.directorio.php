<?php
/**********************************************************************************************************
JA 22/10/2024 dIRECTORIO TELEFONICO
***********************************************************************************************************/
session_start();

include_once ("inc.lib.conexion.php");
 
//print_r($_SESSION);
//print_r($_POST);
/***************************************************************************
Estas funciones no estan en uso J.A 22-10-2024
***************************************************************************/
  // function lst_cargo($actual) {
  //   global $cnxODBC;
    
  //   $cadSQL = sprintf("exec wCons_Cargo @cargo= '%s' ", $actual);
  //   $consulta = odbc_exec($cnxODBC, $cadSQL);
   
  //   echo "<option value=0>--- Seleccione ---</option>";

  //   if (is_resource($consulta)) {
   
  //     while (odbc_fetch_row($consulta)) {           
  //       $cadcargo = odbc_result($consulta,"cargo");
  //       $cadid = odbc_result($consulta,"cargo");   
        
  //       $cadSEL = ($cadcargo == trim($actual) ) ? "Selected" : "";
  //       $cadMSG = (sprintf("%s %s", 
  //             $cadcargo, 
  //             "" )
  //             );
  //       echo sprintf('<option value="%s" %s>%s</option>', 
  //           $cadid, 
  //           $cadSEL, 
  //           $cadMSG
  //         );
  //     }
  //     odbc_free_result($consulta); 
  //   }
       
  // }

  // function lst_departamento($actual) {
  //   global $cnxODBC;
    
  //   $cadSQL = sprintf("wCons_Departamento @var= '%s' ", $actual);
  //   $consulta = odbc_exec($cnxODBC, $cadSQL);
   
  //   echo "<option value=0>--- Seleccione ---</option>";

  //   if (is_resource($consulta)) {
   
  //     while (odbc_fetch_row($consulta)) {           
  //       $cadcargo = odbc_result($consulta,"departamento");
  //       $cadid = odbc_result($consulta,"departamento");   
        
  //       $cadSEL = ($cadcargo == trim($actual) ) ? "Selected" : "";
  //       $cadMSG = (sprintf("%s %s", 
  //             $cadcargo, 
  //             "" )
  //             );
  //       echo sprintf('<option value="%s" %s>%s</option>', 
  //           $cadid, 
  //           $cadSEL, 
  //           $cadMSG
  //         );
  //     }
  //     odbc_free_result($consulta); 
  //   }
       
  // }
//****************************************************************************************************************/
 
$cnxODBC = establecerconexionODBC(); // conexion a la BD

if (isset($_POST['Extension'])) {$_SESSION['Extension'] = $_POST['Extension'];}
if (isset($_POST['DEPARTAMENTO'])) {$_SESSION['DEPARTAMENTO'] = $_POST['DEPARTAMENTO'];}
if (isset($_POST['CARGO'])) {$_SESSION['CARGO'] = $_POST['CARGO'];}
$v_nomina = $_SESSION['TIPO_NOMINA'];
$cargo = $_SESSION['CARGO'];

?>
<!DOCTYPE html>
<html>

<head>
	    <link rel="stylesheet" href="./css/bootstrap.min.css" crossorigin="anonymous">
      <link rel="stylesheet" href="./DataTables/datatables.min.css" >
      <link rel="stylesheet" href="./DataTables/DataTables-1.10.23/dataTables.bootstrap.min.css" >
      <link href="./-free-5.15/font-awesome.min.cs" rel="stylesheet"> 
      <meta charset="utf-8">
	<title>Directorio Telefonico</title>
  <script type="text/javascript">
    function confirmar(){
      return confirm('¿Estas Seguro?, se eliminar los Datos');
    }
  </script>
</head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
  <form name="tasa" id="tasa" action="reg.directorio.php" method="post">
    <!-- <center>
  <button class="btn btn-Dark" name="back" onclick="window.location='index.php'"><i class="fas fa-arrow-circle-left"></i>
          Salir
        </button>
        </center> -->

<h1 >Registro Directorio telef&oacute;nico</h1>
<br>




<div class="card" style="width: 80rem;">  
  <div class="card-body">      
        <input type="text" name="DEPARTAMENTO" placeholder='Departamento' > 
        <input type="text" name="CARGO" placeholder='Cargo'>	
        <input type="text" name="NOMBRE"  placeholder='Nombre'>
        <input type="text" name="EXTENCION" placeholder='Extension/Telefono'>	
  </div>
  </div> 
  <br>
  <br>
  <div class="tabla" >  
			<input type="hidden" name="PS" value="<?php echo $_SERVER['PHP_SELF']?>">
      <input type="hidden" name="USUARIO" value="<?PHP echo $_SESSION['usuario']?>" />
<div class="fila">	
<div class="col">		
<input type="submit" name="REGISTRAR" value="Registrar" >
</div>
</div>
    </form>
	  </div>
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        DIRECTORIO TELEFONICO
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
<table  id="pro" class="display"  > 
  <thead > 
            <tr >                
                <th class="table-primary">DEPENDENCIA</th> 
                <th class="table-primary">CARGO</th> 
                <th class="table-primary">NOMBRE</th>             
                <th class="table-primary">EXTENSION</th>
                <th class="table-primary"></th>
                <th class="table-primary"></th>                              
            </tr>
        </thead>
        <tbody>            
            <?php
             $sql = "	  
             SELECT Dependencia, Cargo, Extension, Nombre
FROM      directorio_telefonico
ORDER BY Dependencia,Cargo DESC
             ";
            $stmt = odbc_exec( $cnxODBC, $sql  );
            while( $row = odbc_fetch_array( $stmt) ) {
              ?>
                <tr>                      
                       <td ><?php echo $row['Dependencia']?></td>
                       <td ><?php echo $row['Cargo']?></td>
                       <td ><?php echo $row['Nombre']?></td> 
                       <td ><?php echo $row['Extension']?></td>
                       <td>
                       <a class="btn btn-outline-primary" href="edit_directorio.php?extension=<?php echo $row['Extension']?>&Cargo=<?php echo $row['Cargo']?>&Nombre=<?php echo $row['Nombre']?>&Dependencia=<?php echo $row['Dependencia']?>">Editar</a>
                       </td>
                       <td>
                       <a class="btn btn-outline-danger" href="eliminar_directorio.php?extension=<?php echo $row['Extension']?>&Cargo=<?php echo $row['Cargo']?>&Nombre=<?php echo $row['Nombre']?>&Dependencia=<?php echo $row['Dependencia']?>" onclick='return confirmar()'>Eliminar</a>
                       </td>
                </tr>
           <?php }
            
            odbc_free_result($stmt);?>
            
           </tbody>
        <tfoot>
           <tr >       
                <th></th>
                <th></th>                
                <th></th>                          
          </tr>
        </tfoot>        
    </table>
      </div>
    </div>
  </div>  
</div>
</div>
<br>
<script type="text/javascript" src="./js/popper.min.js" ></script>
<script type="text/javascript" src="./js/bootstrap.bundle.min.js" ></script>
<script type="text/javascript" src="./js/validar.js"></script>
<script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="./DataTables/datatables.min.js"></script>
<script type="text/javascript" src="./DataTables/Buttons-1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="./DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="./DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="./DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="./DataTables/Buttons-1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="./buttons.html5.styles.min.js"></script>
<script type="text/javascript" src="./buttons.html5.styles.templates.min.js"></script>
<script type="text/javascript" src="./main.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$('#pro').DataTable({
scrollY: true,
scrollX: false, 
deferRender:    true,
stateSave: true,
ordering: false,
});
 
}); 
</script>
</body>
</html>

