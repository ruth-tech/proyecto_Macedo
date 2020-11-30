<?php
require '../../php/conexion.php';


$idvehiculo = $_POST['vehiculoid'];
  
$sql = "SELECT * FROM modelos_vehiculos"
." WHERE `rela_vehiculo` = ". $idvehiculo
." AND estado =1";

// echo $sql;
// exit();

$rs = mysqli_query($conexion, $sql);

$modelos = array();

while($row = mysqli_fetch_array($rs)){
    $modelos[]= array(
        "vehiculo_id"=>$idvehiculo,
        "id"=>$row['modelo_vehiculo_id'],
        "modelo" => preg_replace('([^A-Za-z0-9 ])', '', $row['modelo_vehiculo_descripcion']),
        "anio" => $row['modelo_vehiculo_anio']
    );
} 
$modelosjson = json_encode($modelos);
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

echo $modelosjson;

?>