$(document).ready(function() {
  // AJAX para la creación de nuevos administradores
    $('#crear-admin').on('submit', function(e) {
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
                    'Se agregó correctamente!',
                    'success'
                )
            } else {
                swal(
                    'Error...',
                    'El usario ya existe!',
                    'error'
                )
            }
        }
      });
    });

  // AJAX para el lOGIN
    $('#login-admin').on('submit', function(e) {
      e.preventDefault();

      var datos = $(this).serializeArray();

      $.ajax({
        type: $(this).attr('method'),
        data: datos,
        url: $(this).attr('action'),
        dataType: 'json',
        success: function(data) {
          // console.log(data);
          var resultado = data;
          if(resultado.respuesta == 'exitoso') {
              swal(
                  'Login Correcto',
                  'Bienvenido '+resultado.usuario+'',
                  'success'
              )
          } else {
              swal(
                  'Error...',
                  'Usuario o Password Incorrectos!',
                  'error'
              )
          }
      }
      });
      /*.done( function(data) {
        console.log(data);
      });*/
    });
});
