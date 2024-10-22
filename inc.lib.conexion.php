<?php
/**************************************************
conexion a base de datis sql ODBC UNIX J.A
***************************************************/
define("ODBC_DSN", "DIRECTORIO");
//define("ODBC_DSN"       , "PRUEBANOMINA");
define("ODBC_CLAVE", "dirtelef");
define("ODBC_CONTRASENA","12345");


/*-------------------------------------------------------------------------------------*/
function establecerconexionODBC() {
        if ( !( isset($GLOBALS['CNXODBC']) && is_resource($GLOBALS['CNXODBC']) ) ) {
                if (strtoupper(substr(PHP_OS,0,3)) == 'WIN') {
                        $GLOBALS['CNXODBC'] = odbc_connect(ODBC_DSN, ODBC_CLAVE, ODBC_CONTRASENA,   SQL_CUR_USE_ODBC);
                } else {
                        $GLOBALS['CNXODBC'] = odbc_connect(ODBC_DSN, ODBC_CLAVE, ODBC_CONTRASENA);
                }
                $xconsulta = odbc_exec($GLOBALS['CNXODBC'], "SET DATEFORMAT YMD");
        }
        return $GLOBALS['CNXODBC'];
}

/*-------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------*/
?>
