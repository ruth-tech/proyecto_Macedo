//Prueba de JS
//console.log('Hello Word'); 

//Comprobar el funcionamiento de jquery
$(document).ready(function(){

    console.log('Jquery is working');

    fetchList();//llamado y ejecucuion de la funcioon que muestra el listado de clientes

    // Listado

    function fetchList(){
        $.ajax({
            url: 'lista.php',
            type: 'GET',
            success: function(response){
                let lista = JSON.parse(response);
                console.log(lista);
                let template = '';

                if(lista.length !== 0){

                    lista.forEach(lista => {
                        template +=
                        `<tr clienteId="${lista.clienteId}">
                            <td>${lista.clienteId}</td>
                            <td>${lista.cliente}</td>
                            <td>${lista.cuil}</td>
                            <td>${lista.nro_cuenta}</td>
                            <td><button class="perfil btn btn-warning"><a id="perfil" href="" personaId="${lista.personaId}" style="color: black" >Ver Perfil</a></button></td>
                            <td>
                                <button class="cliente-edit btn btn-warning" data-toggle="modal" data-target="#editarCliente" personaId="${lista.personaId}" ><i class="far fa-edit"></i></button>
                                <button class="deleteCliente btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </td>                    
                        </tr>`
                    });
                    $("#listadoClientes").html(template);
                    
                }else{
                    $("#listado-head").hide();
                    template = '¡No se han encontrado registros de clientes activos en la base de datos, agregue al menos uno!';
                    $(".card-body").html(template); 

                }
                
            }
        });
    }                                                                        
    $(document).on('click', '#perfil', function () {
        var href = '/autoparts_system/modulos/perfiles/index.php';
        let element = $(this)[0];                                                                 
        let personaId = $(element).attr('personaId');
        // let element1 = $(this)[0].parentElement.parentElement;
        // let clienteId = $(element1).attr('clienteId');

        // Save information

        // Check if any ID is aviable 
        if (personaId) {
            // Save the url and perform a page load
            var direccion = href + '?personaId=' + personaId; 
            // + '&clienteId='+ clienteId;
            window.open(direccion);
            

        } else {
            // Error handling
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '¡Ha ocurrido un error al intentar ingresar al perfil de la persona seleccionada!',
                showConfirmButton: true,
                confirmButtonColor:"#d63030",
              })
        }
       


    });                                          


    // Agregar

    $('#agregar').submit(function(e){
        //usa e.preventDefault() evita la accion del submit
        e.preventDefault()
        const dataAgregar = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            dni: $('#dni').val(),
            cuil: $('#cuil').val(),
            sexo: $('#sexo').val(),
            fchNac: $('#fchNac').val(),
            nacionalidad: $('#nacionalidad').val(),
            nro_cuenta: $('#nro_cuenta').val()
        }
      console.log(dataAgregar);
      $.ajax({
              url: '/autoparts_system/modulos/Clientes/cliente-add.php',
              type: 'post',
            data: dataAgregar,
          beforeSend: function (){
              //opcional
          //antes de enviar puedes colocar un gif cargando o un  mensaje que diga espere...
          }
  
        }).done(function(response){
              console.log(response);
              Swal.fire(response);
            //   if(response==='Exito'){
            //     Swal.fire({
            //         position: 'center',
            //         icon: 'success',
            //         title: '¡Agregado exitosamente!',
            //         showConfirmButton: false,
            //         timer: 2500
            //     });
              
            // }else{
            //     Swal.fire({
            //         position: 'center',
            //         icon: 'error',
            //         title: '¡Ha ocurrido un error al agregar!',
            //         showConfirmButton: true,
            //         confirmButtonColor:"#d63030",
            //       })
                  
            // }
          fetchList();
          // Se resetea el formulario luego de haber enviado los datos
          $('#agregar').trigger('reset');
        }).fail(function(jqXHR, ajaxOptions, thrownError){
          //en caso de que haya un error muestras un mensaje con el error
          console.log(thrownError);
        });
        //Con esta linea se esconde el modal de agregar
        $('#nuevoCliente').modal('hide');
        
    });

    

    //Eliminar
    $(document).on('click', '.deleteCliente', function(){
        
        if(
            Swal.fire({
                
                icon: 'info',
                html:
                  '¿Está seguro que desea dar de baja este Cliente?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                  '<i class="fa fa-thumbs-up"></i> Eliminar',
                confirmButtonColor:"#d63030",
                cancelButtonText:
                  '<i class="fa fa-thumbs-down"></i>Cancelar',
              })
        ){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('clienteId');
            
            $.post('cliente-delete.php', {id:id}, function(response){
                console.log(response);
                Swal.fire(response);
                
                fetchList();
                
            });
        }
    });

    //Editar-cliente
    $(document).on('click', '.cliente-edit', function(){
        let element = $(this)[0].parentElement.parentElement;
        let clienteid = $(element).attr('clienteId');
        let element2 = $(this)[0];
        let personaid = $(element2).attr('personaid');

        $.post('cliente-edit.php', {clienteid,personaid}, function(response){
            console.log(response);
           
            const datos = JSON.parse(response);

            $('#personaidedit').val(datos.personaid);
            $('#clienteidedit').val(datos.clienteid);
            
            $('#fechaaltaclienteedit').val(datos.fechaAlta);
            $('#nrocuentaedit').val(datos.nroCuenta);
        });

        $('#editarCliente').submit(function(e){

            const postData = {
                personaid: $('#personaidedit').val(),
                clienteid: $('#clienteidedit').val(),
                
                fechaalta: $('#fechaaltaclienteedit').val(),
                nrocuenta: $('#nrocuentaedit').val()
    
            };
    
            $.ajax({
                url: 'clientes-update.php',
                data: postData,
                type: 'POST',
                success: function(response){
                    Swal.fire(response);
                    console.log(response);
                    fetchList();
                    
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }
            });
            
            $('#editarCliente').modal('hide');

            e.preventDefault();
        });


    

        
    });

 });
