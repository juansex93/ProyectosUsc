const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});

$(document).ready(function () {
  $("#formRegistro").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "../../login/views/ProcederRegistro.php",
      data: $(this).serialize(),
      success: function (response) {
        if (response === "Usuario o correo ya registrado.") {
          Swal.fire({
            title: "Usuario Existente!",
            text: response,
            icon: "warning",
            confirmButtonText: "Ok",
          });
        } else if (
          response === "Ha ocurrido un error al procesar su solicitud."
        ) {
          Swal.fire({
            title: "Error",
            text: response,
            icon: "error",
            confirmButtonText: "Ok",
          });
        } else {
          Swal.fire({
            title: "Registro exitoso!",
            text: response,
            icon: "success",
            confirmButtonText: "Ok",
          });
        }
      },

      error: function () {
        // Manejo de errores
        Swal.fire({
          title: "Error!",
          text: "No se pudo registrar el usuario.",
          icon: "error",
          confirmButtonText: "Ok",
        });
      },
    });
  });
});
