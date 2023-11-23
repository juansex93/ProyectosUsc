<?php
session_start(); // Inicia la sesión

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}


session_destroy()
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Registro o login | Carwash</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../media/img/logo.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="../../assets/css/style2.css" rel="stylesheet">

</head>

<body>
    <div class="d-flex justify-content-center py-4">
        <a class="logo d-flex align-items-center w-auto">
            <img src="../../media/img/logo2.png" alt="Logo de carwash">
            <!-- <span class="d-none d-lg-block">Carwash</span> -->
        </a>
    </div><!--End logo-->

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form id="formRegistro" method="POST">
                <h1>Crear una cuenta</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <!-- <span>O ingresa tus datos personales para registrarte</span> -->
                <input type="text" name="name" placeholder="Nombre" id="yourName" required>
                <input type="email" name="email" placeholder="Correo" id="yourEmail" required>
                <input type="number" name="phone" placeholder="Celular" id="yourUsaername" required>
                <input type="text" name="username" placeholder="Usuario" id="yourUsaername" required>

                <input type="password" name="password" placeholder="Contraseña" id="yourPassword" required>
                <button type="submit">Registrarse</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="POST" id="formLogin">
                <h1>Iniciar sesion</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <!-- <span>O usa tu usuario y contraseña</span> -->
                <input type="text" name="username" placeholder="Usuario" id="yourUsername" required>
                <input type="password" name="password" placeholder="Contraseña" id="yourPassword" required>
                <!-- <a href="#">Perdiste tu contraseña?</a> -->
                <button type="submit">Ingresar</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bienvenido de vuelta!</h1>
                    <p>Ingresa con tu usuario y contraseña para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="login">Ingresar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hola, amigo!</h1>
                    <p>Regístrese con sus datos personales para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../assets/vendor/quill/quill.min.js"></script>
    <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/script.js"></script>
    <script src="../js/Login.js"></script>
</body>

</html>