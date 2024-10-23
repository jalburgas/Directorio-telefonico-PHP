
<?php
//*********************************************************
//Realizado por  juan alburgas  2021 
//DIRECTORIO TELEFONICO
//*******************************************************
session_start();
?>
<!DOCTYPE html>
<html >
<head>
   <link rel="SHORTCUT ICON" href="imagenes/ujapicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio Telef&oacute;nico UJAP</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<?php 
	include_once ("inc.lib.conexion.php");
$cnxODBC = establecerconexionODBC();
	?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="./css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./DataTables/datatables.min.css" >
    <link rel="stylesheet" href="./DataTables/DataTables-1.10.23/dataTables.bootstrap.min.css" >
    <link href="./-free-5.15/font-awesome.min.cs" rel="stylesheet"> 
<head>
  
</head>
<nav class="navbar navbar-dark bg-primary">
     <img src="imagenes/LOGO .png" style="width: 3rem;" >
     <center><h1  class="text-white">DIRECTORIO TELEF&Oacute;NICO </h1></center>
     <form class="form-inline">
     <button  type="button"> <a href="inc.login.php">Administrar</a></button>   
     </form>
</nav>
  <br>
<div class="container">   
    <table  id="pro" class="display"  > 
  <thead >   
            <tr >                
                <th class="table-primary">DEPENDENCIA</th> 
                <th class="table-primary">CARGO</th> 
                <th class="table-primary">NOMBRE</th>             
                <th class="table-primary">EXTENSION</th>
                <th class="table-primary"></th>    
                           
            </tr>
          
        </thead>
        <tbody>
            
            <?php

            

             $sql = "SELECT Dependencia, Cargo, Extension, Nombre
FROM      directorio_telefonico

ORDER BY Dependencia,Cargo


             ";
             //echo $sql;
            $stmt = odbc_exec( $cnxODBC, $sql  );
            //echo  $stmt;
            while( $row = odbc_fetch_array( $stmt) ) {
	   ?>
		    <tr>                      
                       <td ><?php echo $row['Dependencia']?></td>
                       <td ><?php echo $row['Cargo']?></td>
                       <td ><?php echo $row['Nombre']?></td> 
                       <td ><?php echo $row['Extension']?></td>
                       <td> <img src="imagenes/telefono.jpg" style="width: 3rem;" > </td>
                </tr>
           <?php }            
            odbc_free_result($stmt);?>            
           </tbody>        
    </table>
</div>

<script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="./js/popper.min.js" ></script>
<script type="text/javascript" src="./js/bootstrap.bundle.min.js" ></script>
<script type="text/javascript" src="./js/validar.js"></script>
<script type="text/javascript" src="./DataTables/datatables.min.js"></script>
<script type="text/javascript" src="./DataTables/Buttons-1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="./DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="./DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="./DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="./DataTables/Buttons-1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="./buttons.html5.styles.min.js"></script>
<script type="text/javascript" src="./buttons.html5.styles.templates.min.js"></script>
<script type="text/javascript" src="./main.js"></script>
<script defer src="./fontawesome-free-5.15.1-web/js/all.js"></script> 
<script src="js/vue.js"></script> 
<script src="js/vue-router.js"></script> 
<script src="js/config.js"></script>
<!-- llamado Data Table -->
<script type="text/javascript">
$(document).ready(function() {
    $('#pro').DataTable( {
       
        "aaSorting": [], 
        


 
        dom: 'Bfrtip',
        buttons: [
            
            {
                extend:    'excelHtml5',               
                text: '<button class="btn btn-success">Descargar Excel<i class="fas fa-file-excel"></i></button>',
                titleAttr: 'Excel',  
               excelStyles: {
                    template: 'cyan_medium',    // Add 
                 
                },  
  

               
               insertCells: [                  // Agregar una opción de configuración insertCells                   
                    {
                        cells: 's1:2',              // Inserta los datos en las filas 5 y 6 contando desde el encabezado
                        content: 'Celdas nuevas',   // contenido a insertar
                        pushRow: true               // empuja las filas hacia abajo para insertar el contenido                    
                    },
                    {
                        cells: 'B3',                // Celda B3
                        content: 'Esta es la celda B3', // Simplemente sobreescribimos su contenido                                                    
                    }
               ]       

            },
           
        ]
    } );
} );


</script>

</body>

</html>


