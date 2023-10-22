
$(document).ready(function(){
    $("#boton").click(function(){
        $("#parrafo").text("Probando la función ready()");
    });
});



function buscarUsuario(){
    console.log("llega");
    var user = document.getElementById("yourUsername").value;
    var password = document.getElementById("yourPassword").value;
    console.log(user);
    console.log(password);
    
    if(user !== null && password != null ){
        console.log("entra en validacion");
        $.ajax({
            url: "http://localhost/ProyectosUSC/carwash/webService/login/UsuariosLogin.php",
            type: 'POST',
            datatype : "json",
            data: {
                usuario: user,
                password: password

            },  
            success: function(data) {
                //TransformStream.success("Ecnontro los usuarios");
                console.log("Encontro al usuario !!");
            },

            error: function (jqXHR, testStatus, errorThrown) {
                TransformStream.error(errorThrown,"error de la funcon ajax");
                return false;
            }

        });

    }

}