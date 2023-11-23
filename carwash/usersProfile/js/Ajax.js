$(document).ready(function () {
  $("#formChangePass").on("submit", function (e) {
    e.preventDefault(); // Previene el envío tradicional del formulario

    $.ajax({
      type: "POST",
      url: "../views/PasswordChange.php",
      data: $(this).serialize(),
      success: function (response) {
        if (response === "Completado") {
          Swal.fire({
            title: "¡Se Ha Cambiado Correctamente!",
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

function uploadImage() {
  var formData = new FormData();
  var imageFile = document.getElementById("profileImageInput").files[0];
  formData.append("profileImage", imageFile);

  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../views/Upload.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      try {
        if (typeof response === "object") {
          response = JSON.stringify(response);
        }

        var data = JSON.parse(response);
        console.log(data);
        var imagePath = data.newImagePath;
        let correctedPath = imagePath.replace(/\\/g, "/");

        document.getElementById(
          "profileImage"
        ).src = `../views/${correctedPath}`;
        if (data.status === "success") {
          Swal.fire({
            title: "¡Imagen subida correctamente!",
            text: "La imagen se ha subido correctamente. Recuerda Que Se Actualizaro Ya",
            icon: "success",
            confirmButtonText: "Entiendo",
          }).then(() => {
            window.location.reload();
          });
        } else {
          Swal.fire({
            title: "Error",
            text: "No se pudo procesar la solicitud de carga.",
            icon: "error",
            confirmButtonText: "Ok",
          });
        }
      } catch (e) {
        console.error("Error al analizar la respuesta:", e);
      }
    },
    error: function (xhr, status, error) {
      if (typeof xhr === "object") {
        xhr = JSON.stringify(xhr);
      }
      Swal.fire({
        title: "Error",
        text: xhr + status + error,
        icon: "error",
        confirmButtonText: "Ok",
      });
    },
  });
}

document
  .getElementById("removeProfileImageButton")
  .addEventListener("click", function (e) {
    e.preventDefault();

    Swal.fire({
      title: "¿Estás seguro?",
      text: "Esta acción eliminará tu foto de perfil actual.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "../views/ProcessChangeImage.php",
          data: { action: "removeImage" },
          success: function (response) {
            if (response === "Completado") {
              Swal.fire({
                title: "¡Imagen Eliminada!",
                text: "Tu foto de perfil ha sido eliminada.",
                icon: "success",
                confirmButtonText: "Continuar",
              }).then(() => {
                window.location.reload();
              });
            } else {
              Swal.fire({
                title: "Error",
                text: "No se pudo eliminar la foto de perfil.",
                icon: "error",
                confirmButtonText: "Intentar de nuevo",
              });
            }
          },
          error: function (xhr, status, error) {
            if (typeof xhr === "object") {
              xhr = JSON.stringify(xhr);
            }
            Swal.fire({
              title: "Error",
              text:
                "Error en la solicitud: " + error + " " + status + " " + xhr,
              icon: "error",
              confirmButtonText: "Ok",
            });
          },
        });
      }
    });
  });

$(document).ready(function () {
  $("#formEditProfile").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "../views/ProcessChangeInfo.php",
      data: $(this).serialize(),
      success: function (response) {
        console.log(response);
        if (typeof response === "object") {
          response = JSON.stringify(response);
        }
        var data = JSON.parse(response);
        if (data.status === "success") {
          Swal.fire({
            title: "¡Se Ha Cambiado Correctamente!",
            text: data.message,
            icon: "success",
            confirmButtonText: "Continuar",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          });
        } else {
          Swal.fire({
            title: "Error",
            text: data.message,
            icon: "error",
            confirmButtonText: "Intentar de nuevo",
          });
        }
      },
      error: function (xhr, status, error) {
        if (typeof xhr === "object") {
          xhr = JSON.stringify(xhr);
        }
        Swal.fire({
          title: "Error",
          text: status + " " + error + " " + xhr,
          icon: "error",
          confirmButtonText: "Ok",
        });
      },
    });
  });
});

$(document).ready(function () {
  $("#formServicioLavado").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "../views/ProcessAddService.php",
      data: $(this).serialize(),
      success: function (response) {
        console.log(response);
        if (typeof response === "object") {
          response = JSON.stringify(response);
        }
        var data = JSON.parse(response);
        if (data.status === "success") {
          Swal.fire({
            title: "¡Se Ha Agregado Correctamente!",
            text: data.message,
            icon: "success",
            confirmButtonText: "Continuar",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          });
        } else {
          Swal.fire({
            title: "Error",
            text: data.message,
            icon: "error",
            confirmButtonText: "Intentar de nuevo",
          });
        }
      },
      error: function (xhr, status, error) {
        // Manejo de errores de la solicitud AJAX
        if (typeof xhr === "object") {
          xhr = JSON.stringify(xhr);
        }
        Swal.fire({
          title: "Error",
          text: status + " " + error + " " + xhr,
          icon: "error",
          confirmButtonText: "Ok",
        });
      },
    });
  });
});

$(document).ready(function () {
  $("#formAddService").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "../views/AddServiceInVehicle.php",
      data: $(this).serialize(),
      success: function (response) {
        console.log(response);
        if (typeof response === "object") {
          response = JSON.stringify(response);
        }
        var data = JSON.parse(response);
        if (data.status === "success") {
          Swal.fire({
            title: "¡Se Ha Agregado Correctamente!",
            text: data.message,
            icon: "success",
            confirmButtonText: "Continuar",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          });
        } else {
          Swal.fire({
            title: "Error",
            text: data.message,
            icon: "error",
            confirmButtonText: "Intentar de nuevo",
          });
        }
      },
      error: function (xhr, status, error) {
        // Manejo de errores de la solicitud AJAX
        if (typeof xhr === "object") {
          xhr = JSON.stringify(xhr);
        }
        Swal.fire({
          title: "Error",
          text: status + " " + error + " " + xhr,
          icon: "error",
          confirmButtonText: "Ok",
        });
      },
    });
  });
});
