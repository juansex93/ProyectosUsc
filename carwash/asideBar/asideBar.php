<?php
require_once '../../webService/CRUD/CRUD.php';
// $usuarioInfo = $_SESSION['usuario'];

$class = new crud();
$data = json_encode($usuarioInfo);
$get = $class->consultar("SELECT * FROM registros WHERE id_cliente = ?", [$usuarioInfo['id_cliente']]);
$encode = json_encode($get);
// echo '<script>console.log(' . $encode . ');</script>'

?>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="../">
                <i class="bi bi-grid"></i>
                <span>Carwash sas</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="../../login/views/loginPage.php">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="../../login/views/loginPage.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

        <?php if (count($get) > 0): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../../services/views/Services.php">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Servicios</span>
                </a>
            </li>

        <?php endif; ?>
        <!-- End Login Page Nav -->
    </ul>

</aside>