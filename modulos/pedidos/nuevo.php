<?php

    require '../../php/conexion.php';

    session_start();

    // Si no existe la variable de sesión logueado, entonces el usuario debe loguearse.
    if (!isset($_SESSION["logueado"])) {
        header("location: ../../index.php?error=debe_loguearse");
        exit;
    }

    $sql = "SELECT * FROM clientes"
    . " INNER JOIN personas_fisicas
    ON clientes.`rela_persona_fisica`=
    personas_fisicas.`persona_fisica_id`"
    . " INNER JOIN personas ON personas.`persona_id`=
    personas_fisicas.`rela_persona`"
    . " WHERE clientes.`estado`=1 ";

    // echo $sql;
    // exit;

    $rs_cliente = $conexion->query($sql) or die($conexion->error);

    $sql1 = "SELECT * FROM empleados"
    . " INNER JOIN personas_fisicas ON empleados.`rela_persona_fisica`= personas_fisicas.`persona_fisica_id`"
    . " INNER JOIN personas ON personas.`persona_id`= personas_fisicas.`rela_persona`"
    . " INNER JOIN usuarios ON usuarios.rela_persona = personas.persona_id"
    . " INNER JOIN perfiles ON perfiles.perfil_id = usuarios.rela_perfil"
    . " WHERE empleados.`estado`=1 AND perfiles.perfil_descripcion = 'VENDEDOR'";

    // echo $sql1;
    // exit;
    $rs_empleado = $conexion->query($sql1) or die($conexion->error);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo pedido</title>
    <?php require '../../php/head_link.php'; ?>
    <?php require '../../php/head_script.php'; ?>
    <!-- <link rel="stylesheet" href="\autoparts_system\css\clientes.css"> -->
    <script src="pedidos.js"></script>
    
</head>
<body>

    

    

    <?php require '../../php/menu.php'; ?>
    
    <div class="container-fluid">
        <div class="container">

            <div class="card" id="card-main">
                <div class="card-header">
                    
                    <h3><i class="far fa-edit"></i>Nuevo pedido</h3>

                </div>
                <div class="card-body">

                <form class="form-horizontal" role="form" id="pedido-nuevo">
				    <div class="form-group row">
				        <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				        <div class="col-md-3">
                            <select name="cliente" id="cliente" >
                                <option value="">--SELECCIONE--</option>
                                <?php 
                                    while ($row = $rs_cliente->fetch_assoc()) {
                                    echo '<option value="'.$row['persona_id'].'">'.$row['apellidos_persona'].' '.$row['nombres_persona'].'</option>'  ;
                                    }

                                ?>
                            </select>
                            <input type="hidden" id="personaid">	
                        </div>
                        
                        <label for="tel1" class="col-md-1 control-label">Teléfono</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" id="tel" placeholder="Teléfono" readonly>
                                    </div>
                        <label for="mail" class="col-md-1 control-label">Email</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly>
                                </div>
                    </div>
                    
						<div class="form-group row">
							<label for="empresa" class="col-md-1 control-label">Vendedor</label>
							<div class="col-md-3">
                            <select name="empleado" id="empleado">
                                <option value="">--SELECCIONE--</option>
                                <?php 
                                    while ($row = $rs_empleado->fetch_assoc()) {
                                    echo '<option VALUE="'.$row['empleado_id'].'">'.$row['apellidos_persona'].' '.$row['nombres_persona'].'</option>'  ;
                                    }

                                ?>
                            </select>
							</div>
							<label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
							</div>
							<label for="email" class="col-md-1 control-label">Pago</label>
							<div class="col-md-3">
								<select class='form-control input-sm' id="condiciones">
									<option value="1">Efectivo</option>
									<option value="2">Cheque</option>
									<option value="3">Transferencia bancaria</option>
									<option value="4">Crédito</option>
								</select>
							</div>
						</div>
				
				
				<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
						 <span class="glyphicon glyphicon-plus"></span> Nuevo producto
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Nuevo cliente
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-search"></span> Agregar productos
						</button>
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>	



                    

                </div>

            </div>

        </div>

        


        <?php require "../../php/footer.php"; ?>
    </div> 

    <script>
        // function myfunction(id){
        //     alert("El ID es: "+id);

        //     $.ajax({
        //         url: 'autocompletar/contactos.php',
        //         type: 'post',
        //         data: id,
        //         beforeSend: function (){
        //             //opcional
        //         //antes de enviar puedes colocar un gif cargando o un  mensaje que diga espere...
        //         }
    
        //     }).done(function(response){
        //         console.log(response);
        //         // Swal.fire(response);
                    
        //     }).fail(function(jqXHR, ajaxOptions, thrownError){
        //         //en caso de que haya un error muestras un mensaje con el error
        //         console.log(thrownError);
        //     });
        

            
        // };
        $('#cliente').on("change",function(e){
            e.preventDefault();
            let personaid = $(this).val();
            alert("El id es: "+personaid);
            $('#personaid').val(personaid);

            $.ajax({
                data: {personaid},
                type: 'post',
                url: 'autocompletar/contactos.php',   
                
                beforeSend: function (){
                    //opcional
                //antes de enviar puedes colocar un gif cargando o un  mensaje que diga espere...
                }
    
            }).done(function(response){
                console.log(response);
                const list = JSON.parse(response);
                console.log(list)

                $('#tel').val('');
                $('#tel').val(list.contacto)
                // Swal.fire(response);
                    
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                //en caso de que haya un error muestras un mensaje con el error
                console.log(thrownError);
            });

            // $.post('autocompletar/contactos.php', {personaid}, function(response){
            //     console.log(response);                    
            //     const datos = JSON.parse(response);
            //     console.log(datos)

            //     $('#tel1').val(datos.valorcontacto);
                
            // });
    })
    </script>
</body>
</html>