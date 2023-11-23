<?php
require_once('../../webService/CRUD/CRUD.php');

$conex = new crud;
session_start();
$usuarioInfo = $conex->checkUserSession();


$consultaRegistros = "SELECT registros.*, vehiculos.* FROM vehiculos INNER JOIN registros ON vehiculos.id_cliente = registros.id_cliente WHERE registros.id_cliente = ?";
$dataJson = $conex->consultar($consultaRegistros, [$usuarioInfo['id_cliente']]);


// echo '<script>console.log(' . json_encode($data) . ');</script>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Servicios / </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <?php include_once('../../header/Header.php') ?>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <?php include_once('../../asideBar/asideBar.php') ?>
    <!-- ======= Sidebar ======= -->
    < <!-- End Sidebar-->

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Servicios</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Components</li>
                        <li class="breadcrumb-item active">Servicios</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="container-fluid">
                        <!-- Card with an image on left -->
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://www.shutterstock.com/image-photo/woman-washing-her-car-selfservice-600nw-1861269733.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card Wash</h5>
                                        <p class="card-text">
                                            Carwash va más allá de ser solo una aplicación; es una solución integral
                                            que mejora significativamente tanto la experiencia del cliente como la
                                            eficiencia operativa de los proveedores de servicios. Al integrar tecnología
                                            y un diseño centrado en el usuario, estamos estableciendo un estándar en la
                                            industria para lavado de vehículos, ofreciendo una experiencia sin esfuerzo,
                                            personalizable y satisfactoria para todos los involucrados.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card with an image on left -->
                        <div class="mt-5">
                            <?php foreach ($dataJson as $row): ?>
                                <div class="card">
                                    <div class="card-header">
                                        Detalles del Vehículo
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Registro del Vehículo</h5>
                                        <p class="card-text">Placa:
                                            <?php echo htmlspecialchars($row['placa']); ?>
                                        </p>
                                        <p class="card-text">Precio:
                                            <?php echo htmlspecialchars($row['precio']) ?> COP
                                        </p>
                                        <!-- <a href="#" class="btn btn-primary">Más detalles</a> -->
                                    </div>
                                    <div class="card-footer text-muted">
                                        Fecha de registro:
                                        <?php echo htmlspecialchars($row['fecha_ingreso']); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
            </section>

        </main>
        <!-- End #main -->


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
        <script src="../../assets/js/main.js"></script>

</body>

</html>