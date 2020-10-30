$(document).ready(function() {
  // AJAX para la creación de nuevos elementos
    $('#guardar-registro').on('submit', function(e) {
      e.preventDefault();

      var datos = $(this).serializeArray();
      $.ajax({
        type: $(this).attr('method'),
        data: datos,
        url: $(this).attr('action'),
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if(data.respuesta == 'exito') {
                swal(
                    'Registro Exitoso!',
                    'Se guardó correctamente!',
                    'success'
                )
            } else {
                swal(
                    'Error...',
                    'Ha ocurrido un error!',
                    'error'
                )
            }
        }
      });
    });

  // Método para insertar una imagen con Ajax
    // Esto es necesario siempre que se trabaje con imagenes en el servidor
  $('#guardar-registro-archivo').on('submit', function(e) {
    e.preventDefault();

    var datos = new FormData(this);
    // console.log(datos);

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      contentType: false,
      processData: false,
      async: true,
      cache: false,
      success: function(data) {
          console.log(data);
          if(data.respuesta == 'exito') {
              swal(
                  'Registro Exitoso!',
                  'Se guardó correctamente!',
                  'success'
              )
          } else {
              swal(
                  'Error...',
                  'Ha ocurrido un error!',
                  'error'
              )
          }
      }
    });
  });

  // Eliminar un Registro

  $('.borrar_registro').on('click', function(e){
    e.preventDefault();

    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');

    swal({
        title: 'Estas seguro?',
        text: "Esta acción no se puede revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si! Eliminar',
        cancelButtonText: 'Cancelar'
    }).then(function () {
          $.ajax({
            type: 'post',
            data: {
              'id': id,
              'registro': 'eliminar'
            },
            url: 'modelo-'+tipo+'.php',
            success:function(data){
              var resultado = JSON.parse(data);
              console.log(resultado);
              if (resultado.respuesta == 'exito') {
                swal(
                     'Eliminado!',
                     'Se ha eliminado el registro',
                     'success'
                 );
              } else {
                swal(
                   'Error!',
                   'No se pudo eliminar, intente de nuevo.',
                   'error'
               )
              }
              jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
            }

          });
      });
  });
});
