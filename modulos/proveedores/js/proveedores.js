$(document).ready(function(){
    console.log('Funciona JS de Proveedores');

    proveedoreslist();//llamado y ejecucuion de la funcioon que muestra el listado de clientes

    // Listado

    function proveedoreslist(){
        $.ajax({
            url: 'lista.php',
            type: 'GET',
            success: function(response){
                console.log(response)
                let registros = JSON.parse(response);
                console.log(registros);
                let template ='';

                if(registros.length !== 0){

                    registros.forEach(registros=>{
                        template +=
                        `<tr proveedorId="${registros.proveedorid}">
                            <td>${registros.proveedorid}</td>
                            <td>${registros.proveedor}</td>
                            <td>${registros.cuit}</td>
                            <td>${registros.categoria}</td>
                            <td><a href="${registros.website}">${registros.website}</a></td>
                            <td><button class="perfil btn btn-warning"><a id="perfil" href="" personaId="${registros.personaId}" style="color: black" >Ver Perfil</a></button></td>
                            <td>
                                <button class="proveedor-edit btn btn-warning" data-toggle="modal" data-target="#editarProveedor" personaId="${registros.personaId}" ><i class="far fa-edit"></i></button>
                                <button class="deleteProveedor btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>`
                    });
                    $("#listadoProveedores").html(template);
                }else{
                    $("#listado").hide();
                    template = '¡No se han encontrado registros de Proveedores activos en la base de datos, agregue al menos uno!';
                    $(".card-body").html(template);
                }                
            }
        });
    } 

    // ACCESO AL PERFIL
    $(document).on('click', '#perfil', function () {
        var href = '/autoparts_system/modulos/perfiles/index-juridica.php';
        let element = $(this)[0];                                                                 
        let personaId = $(element).attr('personaId');

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
            cuit: $('#cuit').val(),
            razonsocial: $('#razonsocial').val(),
            categoria: $('#categoria').val(),
            nrohabilitacion: $('#nrohabilitacion').val(),
            website: $('#website').val()           
        }
      console.log(dataAgregar);
      $.ajax({
              url: '/autoparts_system/modulos/proveedores/proveedor-add.php',
              type: 'post',
            data: dataAgregar,
          beforeSend: function (){
              //opcional
          //antes de enviar puedes colocar un gif cargando o un  mensaje que diga espere...
          }
  
        }).done(function(response){
              console.log(response);
              Swal.fire(response);
            //   if(response!=="Exito"){
            //     Swal.fire({
            //         position: 'center',
            //         icon: 'success',
            //         title: '¡Agregado exitosamente!',
            //         showConfirmButton: false,
            //         timer: 5000
            //     });
              
            // }else{
            //     Swal.fire({
            //         position: 'center',
            //         icon: 'error',
            //         title: '¡Ha ocurrido un error al intentar agregar, inténtelo nuevamnete!',
            //         showConfirmButton: true,
            //         confirmButtonColor:"#d63030",
            //       })
                  
            // }
            proveedoreslist();
          // Se resetea el formulario luego de haber enviado los datos
          $('#agregar').trigger('reset');
        }).fail(function(jqXHR, ajaxOptions, thrownError){
          //en caso de que haya un error muestras un mensaje con el error
          console.log(thrownError);
        });
        //Con esta linea se esconde el modal de agregar
        $('#nuevoProveedor').modal('hide');
        
    });

    //Eliminar
    $(document).on('click', '.deleteProveedor', function(){
        
        if(
            Swal.fire({
                
                icon: 'info',
                html:
                  '¿Está seguro que desea dar de baja este Empleado?',
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
            let id = $(element).attr('proveedorId');
            
            $.post('proveedor-delete.php', {id:id}, function(response){
                console.log(response);
                Swal.fire(response);
                // if(response!=="Exito"){
                //     Swal.fire({
                //         position: 'center',
                //         icon: 'success',
                //         title: '¡Dado de baja exitosamente!',
                //         showConfirmButton: false,
                //         timer: 5000
                //     });
                  
                // }else{
                //     Swal.fire({
                //         position: 'center',
                //         icon: 'error',
                //         title: '¡Ha ocurrido un error al dar de baja al proveedor seleccionado!',
                //         showConfirmButton: true,
                //         confirmButtonColor:"#d63030",
                //     })
                      
                // }
                proveedoreslist();
                
            });
        }
    });

    //Editar-cliente
    $(document).on('click', '.proveedor-edit', function(){
        let element = $(this)[0].parentElement.parentElement;
        let proveedorid = $(element).attr('proveedorId');
        

        $.post('proveedor-edit.php', {proveedorid}, function(response){
            console.log(response);
           
            const datos = JSON.parse(response);

            $('#proveedoridedit').val(datos.proveedorid);
            $('#fechaaltaproveedoredit').val(datos.fechaAlta);            
            $('#websiteedit').val(datos.website);
            $('#categoriaedit').val(datos.categoria);
        });

        $('#editar-proveedor').submit(function(e){
            e.preventDefault();
            const postData = {
                proveedorid: $('#proveedoridedit').val(),
                fechaalta: $('#fechaaltaproveedoredit').val(),
                website: $('#websiteedit').val(),
                categoria: $('#categoriaedit').val()
    
            };
    
            $.ajax({
                url: 'proveedor-update.php',
                data: postData,
                type: 'POST',
                success: function(response){
                    Swal.fire(response);
                    console.log(response);
                    proveedoreslist();
                    
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }
            });
            
            $('#editarProveedor').modal('hide');

            
        });   

        
    });
});