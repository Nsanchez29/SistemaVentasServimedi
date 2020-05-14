/*=============================================
EDITAR CONTACTO
=============================================*/
$(".tablas").on("click", ".btnEditarContacto", function(){

	var idContacto = $(this).attr("idContacto");

	var datos = new FormData();
    datos.append("idContacto", idContacto);

    $.ajax({

      url:"ajax/contactos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	 $("#idContacto").val(respuesta["id"]);
	       $("#editarContacto").val(respuesta["nombre"]);
         $("#editarCelular").val(respuesta["celular"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarEmail").val(respuesta["email"]);
	       $("#editarDireccion").val(respuesta["direccion"]);
                   
	  }

  	})

})

/*=============================================
ELIMINAR CONTACTO
=============================================*/
$(".tablas").on("click", ".btnEliminarContacto", function(){

	var idContacto = $(this).attr("idContacto");
	
	swal({
        title: '¿Está seguro que desea borrar el contacto?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#ddd',
        confirmButtonColor: '#d33724',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Borrar contacto!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=contactos&idContacto="+idContacto;
        }

  })

})