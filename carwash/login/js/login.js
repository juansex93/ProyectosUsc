$(document).ready(function () {
  $("#formLogin").on("submit", function (e) {
    e.preventDefault(); // Previene el envío tradicional del formulario

    $.ajax({
      type: "POST",
      url: "../views/ProcederLogin.php",
      data: $(this).serialize(),
      success: function (response) {
        if (response === "Inicio de sesión exitoso.") {
          Swal.fire({
            title: "¡Bienvenido!",
            text: response,
            icon: "success",
            confirmButtonText: "Continuar",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "../../dashboard/index.php";
            }
          });
        } else {
          // Si hubo un problema, muestra un mensaje de error
          Swal.fire({
            title: "Error",
            text: response,
            icon: "error",
            confirmButtonText: "Intentar de nuevo",
          });
        }
      },
      error: function (xhr, status, error) {
        // Manejo de errores de AJAX
        Swal.fire({
          title: "Error",
          text: "No se pudo procesar la solicitud de inicio de sesión.",
          icon: "error",
          confirmButtonText: "Ok",
        });
      },
    });
  });
});
