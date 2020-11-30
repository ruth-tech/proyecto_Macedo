$(document).ready(function(){
    console.log('Jquery en pedidos JS');
    listar();

    // pedidosList();
    // function pedidosList(){
    //     $.ajax({
    //         url: 'lista.php',
    //         type: 'GET',
    //         success: function(response){
    //             console.log(response)
    //             let lista = JSON.parse(response);
    //             console.log(lista);
    //             // let template = '';

    //             // if(lista.length !== 0){

    //             //     lista.forEach(lista => {
    //             //         template +=
    //             //         `<tr clienteId="${lista.clienteId}">
    //             //             <td>${lista.clienteId}</td>
    //             //             <td>${lista.cliente}</td>
    //             //             <td>${lista.cuil}</td>
    //             //             <td>${lista.nro_cuenta}</td>
    //             //             <td><button class="perfil btn btn-warning"><a id="perfil" href="" personaId="${lista.personaId}" style="color: black" >Ver Perfil</a></button></td>
    //             //             <td>
    //             //                 <button class="cliente-edit btn btn-warning" data-toggle="modal" data-target="#editarCliente" personaId="${lista.personaId}" ><i class="far fa-edit"></i></button>
    //             //                 <button class="deleteCliente btn btn-danger"><i class="far fa-trash-alt"></i></button>
    //             //             </td>                    
    //             //         </tr>`
    //             //     });
    //             //     $("#listadoClientes").html(template);
                    
    //             // }else{
    //             //     $("#listado-head").hide();
    //             //     template = '¡No se han encontrado registros de clientes activos en la base de datos, agregue al menos uno!';
    //             //     $(".card-body").html(template); 

    //             // }
                
    //         }
    //     });
    // }

})

var listar = function(){
    var table = $('#lista-pedidos-datatables').dataTable({
        "ajax":{
            "method":"POST",
            "url":"lista.php"
        },
        "columns":[
            {"data":"pedido_id"},
            {"data":"pedido_fecha"},
            {"data":"nombreCliente"},
            {"data":"nombreEmpleado"},
            {"data":"cantidad"},
            {"data":"pedido_total"},
            {"data":"pedido_estado_descripcion"},
            {"data":""},
            {"data":""},
        ]
    });
}


