$(document).ready(function() {
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
          //console.log(data);
          var resultado = data;
          if(jQuery.isEmptyObject(data)) {
            swal(
                'Error...',
                'Usuario o Password Incorrectos!',
                'error'
            )

          } else {

            swal(
                'Login Correcto',
                'Bienvenido '+resultado.usuario+'',
                'success'
            );
              setTimeout(function(){
                window.location.href = 'admin-area.php';
              }, 1000)
          }
      }
      });
    });
});
