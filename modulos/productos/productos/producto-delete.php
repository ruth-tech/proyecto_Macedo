<?php

    require '../../../php/conexion.php';

    session_start();

    // Si no existe la variable de sesión logueado, entonces el usuario debe loguearse.
    if (!isset($_SESSION["logueado"])) {
        header("location: ../../../index.php?error=debe_loguearse");
        exit;
    }

    
    $productoid=$_POST['productoid'];

        $query = "UPDATE productoxcategoriaxmodelo SET estado = 0 WHERE productoxcategoria_id = ". $productoid;
    // echo $query;
    // exit;

        $result = mysqli_query($conexion,$query);

        if(!$result){
            die('¡No se ha logrado eliminar el registro de la base de datos!');
        }

       
        echo "¡Registro eliminado exitosamente!";
    


?>