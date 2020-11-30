<?php
require '../../php/conexion.php';


$paisid=$_POST['paisid'];

$sql = "SELECT * FROM provincias"
." WHERE rela_pais=".$paisid;
// echo $sql;
// exit();

$rs_prov = $conexion->query($sql) or die($conexion->error); 
$provincias = array();
while($row = mysqli_fetch_array($rs_prov)){
    $provincias[]= array(
        "id"=>$row['id'],
        "provincia" => preg_replace('([^A-Za-z0-9 ])', '', $row['provincia'])
    );
} 
$provinciasjson = json_encode($provincias);
// switch(json_last_error()) {
//     case JSON_ERROR_NONE:
//         echo ' - Sin errores';
//     break;
//     case JSON_ERROR_DEPTH:
//         echo ' - Excedido tamaño máximo de la pila';
//     break;
//     case JSON_ERROR_STATE_MISMATCH:
//         echo ' - Desbordamiento de buffer o los modos no coinciden';
//     break;
//     case JSON_ERROR_CTRL_CHAR:
//         echo ' - Encontrado carácter de control no esperado';
//     break;
//     case JSON_ERROR_SYNTAX:
//         echo ' - Error de sintaxis, JSON mal formado';
//     break;
//     case JSON_ERROR_UTF8:
//         echo ' - Caracteres UTF-8 malformados, posiblemente codificados de forma incorrecta';
//     break;
//     default:
//         echo ' - Error desconocido';
//     break;
// }

echo $provinciasjson;

?>