<?php

require('../../webService/CRUD/CRUD.php');

$getData = new crud();
session_start();
$usuarioInfo = $getData->checkUserSession();
if (!$usuarioInfo) {
    header("Location: ../../login/index.php");
}

$query = "SELECT * FROM vehiculos WHERE id_cliente = ?";
$getConsultHaveCars = $getData->consultar($query, [$usuarioInfo['id_cliente']]);
$getConsultListServices = $getData->getData('servicios');

$cars = ($getConsultHaveCars);
$services = ($getConsultListServices);
// $encode = json_encode($usuarioInfo);
// echo "<script>console.log($encode);</script>";
// echo "<script>console.log($services);</script>";

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once '../css/Head.php'; ?>

<body>
    <!-- ======= Header ======= -->
    <?php include_once '../../header/Header.php'; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php
    include_once('../../asideBar/asideBar.php')
        ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Perfil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <div class="d-flex justify-content-center align-items-center"
                                style="width: 100px; border-radius: 50%; overflow: hidden;">

                                <img src="<?php echo htmlspecialchars($usuarioInfo['imagen_perfil'] ?? 'https://thumbs.dreamstime.com/z/no-user-profile-picture-24185395.jpg'); ?>"
                                    alt="Profile" class="rounded-circle">
                            </div>

                            <h2>
                                <?php echo htmlspecialchars($usuarioInfo['nombre']); ?>
                            </h2>
                            <h3>Cliente</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">General</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar
                                        Perfil</button>
                                </li>



                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Actualizar Contraseña</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-add-vehicle">Agregar Vehiculo</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                    <h5 class="card-title">Profile Detalles</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nombre Completo</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo htmlspecialchars($usuarioInfo['nombre']); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tipo Usuario</div>
                                        <div class="col-lg-9 col-md-8">Cliente</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Celular</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo htmlspecialchars($usuarioInfo['telefono']); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo htmlspecialchars($usuarioInfo['correo']); ?>
                                        </div>
                                        <?php echo htmlspecialchars($usuarioInfo['correo']); ?>

                                    </div>


                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Imagen De
                                            Perfil</label>
                                        <div class="col-md-8 col-lg-9">

                                            <img src="<?php echo htmlspecialchars($usuarioInfo['imagen_perfil'] ?? ''); ?>"
                                                id="profileImage" alt="Imagen de perfil">

                                            <div class="pt-2">
                                                <input type="file" name="profileImage" id="profileImageInput"
                                                    style="display: none;" onchange="uploadImage()"
                                                    accept="image/png, image/jpeg, image/gif">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    title="Upload new profile image" id="uploadImageButton"
                                                    onclick="document.getElementById('profileImageInput').click();"><i
                                                        class="bi bi-upload"></i></a>


                                                <a class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                                        class="bi bi-trash" id='removeProfileImageButton'></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Profile Edit Form -->
                                    <form method='POST' id="formEditProfile">

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre
                                                Completo</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control" id="fullName"
                                                    value="<?php echo htmlspecialchars($usuarioInfo['nombre']); ?>">
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Celular</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="<?php echo htmlspecialchars($usuarioInfo['telefono']); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="<?php echo htmlspecialchars($usuarioInfo['correo']); ?>">
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </form>
                                    <!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method='POST' action='' id='formChangePass'>


                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva
                                                Contraseña</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Repite
                                                La Nueva Contraseña</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword" required>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-add-vehicle">
                                    <!-- Add Vehicle -->
                                    <form id="formServicioLavado" class="row g-3">
                                        <div class="col-md-6">
                                            <label for="inputPlaca" class="form-label">Placa del Vehículo</label>
                                            <input type="text" class="form-control" id="inputPlaca" name="placa">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputTipoVehiculo" class="form-label">Tipo de Vehículo</label>
                                            <select id="inputTipoVehiculo" class="form-select" name="tipoVehiculo">
                                                <option selected>Elige...</option>
                                                <option value="Carro - Particular">Carro - Particular</option>
                                                <option value="Camión - Transporte de Carga">Camión - Transporte de
                                                    Carga</option>
                                                <option value="Moto - Particular">Moto - Particular</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Registrar Vehiculo</button>
                                        </div>
                                    </form>

                                    <!-- End Vehicle -->

                                    <?php if (count($cars) > 0 && count($services) > 0): ?>
                                        <form id="formAddService" class="row g-3" method="POST">
                                            <div class="col-md-6">
                                                <label for="inputCarSelect" class="form-label">Selecciona El
                                                    Vehiculo</label>
                                                <select id="inputCarSelect" class="form-select" name="id_vehiculo">
                                                    <option selected>Elige...</option>
                                                    <?php foreach ($cars as $car): ?>
                                                        <option value="<?php echo $car['id_vehiculo']; ?>">
                                                            <?php echo $car['tipo_vehiculo']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputTipoServicio" class="form-label">Tipo de Servicio</label>
                                                <select id="inputTipoServicio" class="form-select" name="tipo_servicio">
                                                    <?php foreach ($services as $service): ?>
                                                        <option value="<?php echo $service['precio']; ?>">
                                                            <?php echo $service['nombre']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Agregar Servicio</button>
                                            </div>
                                        </form>
                                    <?php endif; ?>


                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


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
    <script src="../js/Ajax.js"></script>
</body>

</html>