$(document).ready(function(){
    console.log('Jquery en Productos.js');

    let categoria = $('#categoria').attr('categoriaid');
    let modelo = $('#modelo').attr('modeloid');
    console.log(categoria+' - '+modelo);
    productosList();

    function productosList(){
        $.ajax({
            url:'/autoparts_system/modulos/productos/productos/lista.php',
            type:'POST',
            data:{categoria,modelo}
        }).done(function(response){
            console.log(response)
            let datos = JSON.parse(response);
            let template = '';

            if(datos.length != 0){

                datos.forEach(datos =>{
                    template +=
                    `<tr productoxcategoria_id="${datos.id}">
                        <td>${datos.id}</td>
                        <td>${datos.descripcion}</td>
                        <td>${datos.fabricante}</td>                        
                        <td>${datos.detalles}</td>                        
                        <td><span data-placement="top" title="Editar precio" data-toggle="tooltip"><button class="edit-precio text-dark" data-toggle="modal" data-target="#editarPrecio" style="border:none; background:none">${datos.precio}</button></span></td>                        
                        <td>
                            <span data-placement="top" title="Informacion de Producto" data-toggle="tooltip"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#productoInfo" categoria="${datos.categoria} modelo="${datos.modelo}">Ver más</button>
                        </td> 
                        <td>
                            <span data-placement="top" title="Editar datos" data-toggle="tooltip"><button type="button" class=" edit-producto btn btn-warning" data-toggle="modal" data-target="#editarProducto"><i class="far fa-edit"></i></button>
                            <span data-placement="top" title="Eliminar datos" data-toggle="tooltip"><button type="button" class="deleteProducto btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </td> 
                                         
                    </tr>`
                });
                $("#productoslista").html(template);
            }else{
                $("#listado-productos").hide();
                template = '¡No se han encontrado registros de productos activos del modelo de vehiculo en la categoria seleccionada en la base de datos, agregue al menos uno!';
                $(".card-body-productos").html(template);
            }

        }).fail(function(jqXHR, ajaxOptions, thrownError){
            //en caso de que haya un error muestras un mensaje con el error
            console.log(thrownError);
          });

    }
    //ELIMINAR
    $(document).on('click', '.deleteProducto', function(){
        
        if(
            Swal.fire({
                
                icon: 'info',
                html:
                  '¿Está seguro que desea dar de baja este Producto?',
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
            
            let element3 = $(this)[0].parentElement.parentElement.parentElement.parentElement;
            let productoid =$(element3).attr('productoxcategoria_id')
            console.log(productoid)
            
            $.post('producto-delete.php', {productoid}, function(response){
                console.log(response);
                Swal.fire(response);
                
                productosList();
                
            });
        }else{
            productosList();
        }
    });

    //AGREGAR
    $('#agregar').submit(function(e){
        e.preventDefault();
        const dataAgregar = {
            categoria,
            modelo,
            descripcion: $('#descripcion').val(),
            fabricante: $('#fabricante').val(),
            cantidad: $('#cantidad').val(),
            precioproveedor: $('#precioproveedor').val(),
            precioventa: $('#precioventa').val(),
            detalles: $('#detalles').val()
        }
        console.log(dataAgregar);
        $.ajax({
            url: '/autoparts_system/modulos/productos/productos/producto_add.php',
            type: 'POST',
            data: dataAgregar,
            beforeSend: function (){
                //opcional
            //antes de enviar puedes colocar un gif cargando o un  mensaje que diga espere...
            }
        }).done(function(response){
            console.log(response);
            Swal.fire(response);
            productosList();
            $('#agregar').trigger('reset');
        }).fail(function(jqXHR, ajaxOptions, thrownError){
            console.log(thrownError);
        });
        $('#nuevoProducto').modal('hide');   

    });


    //Editar producto
    $(document).on('click', '.edit-producto', function(){
        let element3 = $(this)[0].parentElement.parentElement.parentElement;
        let productoid =$(element3).attr('productoxcategoria_id')
        console.log(productoid)

        $.post('producto-edit.php', {productoid}, function(response){
            console.log(response);
           
            const datos = JSON.parse(response);

            $('#productoidedit').val(datos.productoid);
            $('#descripcionedit').val(datos.producto_descripcion);
            
            $('#fechaedit').val(datos.producto_fecha_ingreso);
            $('#fabricanteedit').val(datos.producto_detalle_fabricante);
            $('#detallesedit').val(datos.producto_detalle_descripcion);
        });

        $('#editar-producto').submit(function(e){
            e.preventDefault();
            const postData = {
                productoid: $('#productoidedit').val(),
                descripcion: $('#descripcionedit').val(),
                
                fechaingreso: $('#fechaedit').val(),
                fabricante: $('#fabricanteedit').val(),
                detalles: $('#detallesedit').val()
    
            };
    
            $.ajax({
                url: 'producto-update.php',
                data: postData,
                type: 'POST',
                success: function(response){
                    Swal.fire(response);
                    console.log(response);
                    productosList();
                    
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }
            });
            
            $('#editarProducto').modal('hide');
        });  

        
    });

    //editar precio
    $(document).on('click','.edit-precio',function(e){
        e.preventDefault();
        let element3 = $(this)[0].parentElement.parentElement.parentElement;
        let productoid =$(element3).attr('productoxcategoria_id')
        console.log(productoid);

        $.post('precio-edit.php', {productoid}, function(response){
            console.log(response);
           
            const datos = JSON.parse(response);

            $('#productoprecioidedit').val(datos.productoid);
            $('#descripcionprecioedit').val(datos.descripcion);
            $('#fabricanteprecioedit').val(datos.fabricante);
            $('#precioproveedoredit').val(datos.precioproveedor);
            $('#precioedit').val(datos.precio);
        });

        $('#editar-precio').submit(function(e){
            e.preventDefault();
            const postData = {
                productoid: $('#productoprecioidedit').val(),
                precioproveedor: $('#precioproveedoredit').val(),
                precio: $('#precioedit').val()
    
            };
    
            $.ajax({
                url: 'precio-update.php',
                data: postData,
                type: 'POST',
                success: function(response){
                    Swal.fire(response);
                    console.log(response);
                    productosList();
                    
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }
            });
            
            $('#editarPrecio').modal('hide');
        }); 


    });

})