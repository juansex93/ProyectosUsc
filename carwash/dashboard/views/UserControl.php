<?php
// $data = $getData->checkUserSession();

// echo "<script>console.log('Usuario logueado: " . json_decode($usuarioInfo) . "');</script>";

?>

<!DOCTYPE html>
<html lang="en">



<body>
    <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
        </a>

    </li><!-- End Notification Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
            You have 4 new notifications
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
            </div>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
            <i class="bi bi-x-circle text-danger"></i>
            <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
            </div>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
            <i class="bi bi-check-circle text-success"></i>
            <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
            </div>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
            <i class="bi bi-info-circle text-primary"></i>
            <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
            </div>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
            <a href="#">Show all notifications</a>
        </li>

    </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
        </a><!-- End Messages Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="message-item">
                <a href="#">
                    <img src="../../assets/img/messages-1.jpg" alt="" class="rounded-circle">
                    <div>
                        <h4>Maria Hudson</h4>
                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                        <p>4 hrs. ago</p>
                    </div>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="message-item">
                <a href="#">
                    <img src="../../assets/img/messages-2.jpg" alt="" class="rounded-circle">
                    <div>
                        <h4>Anna Nelson</h4>
                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                        <p>6 hrs. ago</p>
                    </div>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="message-item">
                <a href="#">
                    <img src="../../assets/img/messages-3.jpg" alt="" class="rounded-circle">
                    <div>
                        <h4>David Muldon</h4>
                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                        <p>8 hrs. ago</p>
                    </div>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
                <a href="#">Show all messages</a>
            </li>

        </ul><!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <div class="d-flex justify-content-center align-items-center"
                style="width: 50px; height: 45px; border-radius: 50%; overflow: hidden;">

                <img src="<?php echo htmlspecialchars($usuarioInfo['imagen_perfil'] ?? 'https://thumbs.dreamstime.com/z/no-user-profile-picture-24185395.jpg'); ?>"
                    alt="Profile" class="rounded-circle" style="object-fit: cover; min-width: 100%; min-height: 100%;">

            </div>

            <span class="d-none d-md-block dropdown-toggle ps-2">
                <?php echo htmlspecialchars($usuarioInfo['nombre'] ?? 'Invitado'); ?>
            </span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <?php echo htmlspecialchars($usuarioInfo['nombre'] ?? 'Invitado'); ?>
                <span>Cliente</span>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="../../usersProfile/views/userProfile.php">
                    <i class="bi bi-person"></i>
                    <span>Mi Perfil</span>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>


            <li>
                <a class="dropdown-item d-flex align-items-center" href="../../login/views/loginPage.php">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Desconectarse</span>
                </a>
            </li>

        </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

</body>

</html>