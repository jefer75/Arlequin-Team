<?php
include 'plantilla.php';
?>
<head>
<title>Decoracion</title>
    
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
<script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    </head>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Decoracion</h1>
  
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Imagenes</h5>
            <p>Estas imagenes modifican a interaz publicitaria de decoracion, ten en cuentra que las imagenes largas se van a acortar</p>

              <input type="submit" class="añadir" id="añadir" value="Añadir" onclick="opendialog();">
              
              <dialog class="añadir_cont" id="añadir_cont">
                <button id="añadir_close" class="btn modal_close" onclick="closedialog();">X</button>

                <h2 class="modal__title">Insertar Imagen</h2> 
          <!-- Multi Columns Form -->

                <form action="../funciones/img_decoracion.php" method="post" class="row g-3" enctype="multipart/form-data" autocomplete="off">
                <div class="col-md-6">

                  <label for="inputEmail5" class="form-label">Imagen</label>

                  <input  class="form-control" type="file" name="imagen" placeholder="subir imagen" required>
                </div>

                
                <div class="text-center">
                  <tr>
                  <input type="submit" name="registrar" value="Registro" class="btn btn-primary modal_close">
                  </tr>
                </div>

            </dialog>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Imagenes</th>
                  </tr>
                </thead>
                <tbody>
                  <?php      
                    $query = $con->prepare("SELECT * FROM decoracion");
                    $query->execute();
                    $imagenes = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($imagenes as $imagen) {
                    ?>
                  <tr>
                    <td>
                        <img class="imagenes_tablas" src="data:<?php echo $imagen['tipo']; ?>;base64,<?php echo base64_encode($imagen['datos']); ?>" alt="<?php echo htmlspecialchars($imagen['nombre']); ?>">
                    </td>                                
                      <td>
                        <a href="#" class="btn btn-warning" onclick="window.open
                        ('../actualizar/decoracion.php?id=<?php echo $imagen['id_imagen'] ?>','','width= 450,height=350, toolbar=NO');void(null);"><i class="bi bi-trash"></i>Eliminar</a>

                    </a>
                        </td>
                        

                      </td>
                        <?php } ?>
                       </tr>
                </tbody>
              </table>                            
              
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- Vendor JS Files -->
  <script src="../../../js/modal.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>