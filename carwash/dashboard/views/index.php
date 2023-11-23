<?php
require('../../webService/CRUD/CRUD.php');
session_start();

$getData = new crud();

try {
  $servicios = $getData->getData('vehiculo');
  $imagenes = $getData->getData('slider');
  $news = $getData->getData('noticias_car_wash ');
  $services = $getData->getData('servicios');
  // $json = json_encode($services);
  // echo "<pre>";
  // var_dump($servicios);
  // echo "</pre>";

  // echo "<script>
  //           // Enviar los datos a JavaScript
  //           let dataFromPHP = $json;
  //           console.log('Datos desde PHP:', dataFromPHP);
  //         </script>";

} catch (\Throwable $th) {
  // Manejar la excepción
  echo "Error: " . $th->getMessage();
}
// $usuarioInfo = $_SESSION['usuario_info'];
$usuarioInfo = $getData->checkUserSession();

// echo "<script>console.log('Usuario logueado: " . json_encode($usuarioInfo) . "');</script>";
?>

<head>
  <?php include_once('../Controllers/header.php') ?>
</head>

<body>
  <!-- ======= Header ======= -->
  <?php include_once('../../header/Header.php') ?>
  <!-- End Header -->


  <!-- ======= Sidebar ======= -->
  <?php include_once('../../asideBar/asideBar.php') ?>
  <!-- End Sidebar-->

  <!-- Incluye la barra de navegación -->
  <!-- Incluye la barra de navegación -->
  <!-- <div id="navbar-container"></div> -->

  <!-- Contenido de la página de inicio -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inicio</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="container-fluid">
          <div class="row">

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Sobre Nosotros</h5>

                  <!-- Slides with captions -->
                  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <?php
                      foreach ($imagenes as $index => $imagen) {
                        $src = $imagen['imagen'];
                        $titulo = $imagen['titulo'];
                        $descripcion = $imagen['descripcion'];
                        $activeClass = ($index === 0) ? 'active' : '';
                        ?>
                        <div class="carousel-item active <?php echo $activeClass; ?>">
                          <img src="<?php echo $src; ?>" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>
                              <?php echo $titulo; ?>
                            </h5>
                            <p>
                              <?php echo $descripcion; ?>
                            </p>
                          </div>
                        </div>
                        <?php
                      }
                      ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>

                  </div><!-- End Slides with captions -->

                </div>
              </div>
              <!-- News & Updates Traffic -->
              <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Nuevas Noticias</h5>

                  <div class="news">
                    <div class="post-item clearfix">
                      <?php foreach ($news as $new): ?>
                        <img src="<?php echo $new['imagen_url']; ?>">
                        <h4><a href="#">
                            <?php echo $new['titulo']; ?>
                          </a></h4>
                        <p>
                          <?php echo $new['resumen']; ?>
                        </p>
                      <?php endforeach; ?>
                    </div>
                  </div>


                </div><!-- End sidebar recent posts-->

              </div>
            </div>



            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Tipos De Servicios</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tipo Servicio y Producto</th>
                        <th>Precio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($services as $type): ?>
                        <tr>
                          <td>
                            <?php echo $type['id']; ?>
                          </td>
                          <td>
                            <?php echo $type['nombre'] . ' - ' . $type['descripcion']; ?>
                          </td>
                          <td>
                            <?php echo $type['precio']; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Vehiculos <span>| Hoy</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Vista</th>
                        <th scope="col">Tipos Servicios </th>
                        <th scope="col">Tipos Vehiculos</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($servicios as $servicio): ?>
                        <tr>
                          <th scope="row"><a href="#"><img src="<?php echo $servicio['imagen']; ?>" alt=""></a>
                          </th>
                          <td>
                            <a href="#" class="text-primary ">
                              <?php echo $servicio["tipo_servicio"]; ?>
                            </a>
                          </td>
                          <td class="fw-bold">
                            <?php echo $servicio['tipo_vehiculo']; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->


      </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">Nameless</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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

  <script>

    const navbarContainer = document.getElementById('navbar-container');

    // Usa la función fetch para cargar el archivo navbar.html
    fetch('../../components/navBaritem.html')
      .then(response => response.text())
      .then(html => {
        // Inserta el contenido HTML en el contenedor
        navbarContainer.innerHTML = html;
      })
      .catch(error => {
        console.error('Error al cargar la barra de navegación:', error);
      });
  </script>
</body>

</html>