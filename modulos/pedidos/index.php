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

    

    

    <?php require '../../php/menu.php'; ?>
    
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
            <div class="card-body">

                <div class="container">
                    <div class="card shadow text-center">
                        <div class="card-header ">
                            <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Todos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pendientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Finalizados</a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <?php require 'todos1.php'?>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Pendientes</div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Finalizados</div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>

        </div>


<?php require "../../php/footer.php"; ?>
    </div> 

    
</body>
</html>