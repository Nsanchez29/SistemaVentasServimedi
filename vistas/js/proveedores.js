/*=============================================
EDITAR PROVEEDOR
=============================================*/
$(".tablas").on("click", ".btnEditarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");

	var datos = new FormData();
    datos.append("idProveedor", idProveedor);

    $.ajax({

      url:"ajax/proveedores.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	 $("#idProveedor").val(respuesta["id"]);
         $("#editarDescripcion").val(respuesta["descripcion"]);
	       $("#editarProveedor").val(respuesta["nombre"]);
	       $("#editarTelefonoProveedor").val(respuesta["telefono_proveedor"]);
         $("#editarEmailProveedor").val(respuesta["email_proveedor"]);
         $("#editarEmpresa").val(respuesta["empresa"]);
         $("#editarTelefonoEmpresa").val(respuesta["telefono_empresa"]);
         $("#editarEmailEmpresa").val(respuesta["email_empresa"]);
	       $("#editarDireccionEmpresa").val(respuesta["direccion_empresa"]);
          
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");
	
	swal({
        title: '¿Está seguro que desea borrar el proveedor?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#ddd',
        confirmButtonColor: '#d33724',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Borrar proveedor!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=proveedores&idProveedor="+idProveedor;
        }

  })

})