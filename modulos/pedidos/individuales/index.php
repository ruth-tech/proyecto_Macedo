<?php
    require '../../php/conexion.php';

    $pedidoid = $_GET['pedidoid'];

    // echo $pedidoid;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <?php require '../../php/head_link.php'; ?>
    <?php require '../../php/head-datatables-link.php';?>
    <?php require '../../php/head_script.php'; ?>
    <?php require '../../php/head-datatables-script.php';?>
    <!-- <link rel="stylesheet" href="\autoparts_system\css\clientes.css"> -->
    <script src="pedidos.js"></script>
    
</head>
<body>

    

    

    <?php require '../../php/menu.php'; ?>
    
    <div class="container-fluid">
        <div class="container">

            <div class="card" id="card-main">
                <div class="card-header">

                    <h3>Pedido N°:<?php echo $pedidoid?></h3>

                </div>
                <div class="card-body">

                    

                </div>
            </div>
            <?php require "../../php/footer.php"; ?>    

        </div>
        
    </div> 

    
</body>
</html>