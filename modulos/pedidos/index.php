<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pedidos</title>
    <?php require '../../php/head_link.php'; ?>
    <?php require '../../php/head-datatables-link.php';?> 
    <?php require '../../php/head_script.php'; ?>
    <?php require '../../php/head-datatables-script.php';?>
    <!-- <link rel="stylesheet" href="\autoparts_system\css\clientes.css"> -->
    <script src="pedidos.js"></script>
    
</head>
<body>
    <?php require '../../php/menu.php' ?>
    
    <div class="container-fluid">

        <div class="card" id="card-main">
            <div class="card-header">
                <div class="btn-group fa-pull-right">
                    <button type="button" class="agregar_pedido btn btn-danger" ><a class="text-white" href="nuevo.php"><i class="fas fa-plus"></i>
                        Agregar</a>
                    </button>

                </div>
                <h3>Pedidos</h3>
            </div>

            <?php require 'todos/index.php';?>
                           
                        

           

        </div>


        <?php require "../../php/footer.php"; ?>
    </div> 

    
</body>
</html>