<?php
session_start();

//include_once("ValidaSesion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php
    include("header.php");

    include("menu.php");

    $idcategoria = "";
    $nombrecat = "";
    $prefijo = "";
    $activo = "";
    $destino = "";
    if (isset($_REQUEST["idcat"])) {

      include("conexion.php");

      $sql = "select idcategoria, nombrecategoria, activo, prefijo from categoria where md5(idcategoria) = '" . $_REQUEST["idcat"] . "'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          $destino = "?idcat=" . md5($row["idcategoria"]);
          $idcategoria = $row["idcategoria"];
          $nombrecat = $row["nombrecategoria"];
          $prefijo = $row["prefijo"];
          $activo = $row["activo"];
          echo "<script>console.log(\"$activo\");</script>";
        }
      } else {
        echo "0 results";
      }

      mysqli_close($conn);
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Categoría</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Alta de categorías</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Llene los siguientes datos:</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form enctype="multipart/form-data" action="productoAcciones.php<?= $destino ?>" method="post">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="idproducto">IDProducto:</label>
                          <input type="text" disabled class="form-control" name="idproducto" id="idproducto" value="" placeholder="ID del producto.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Categoría:</label>
                          <select class="form-control" id="idcategoria" name="idcategoria">
                            <option value="0">-- Seleccione una opción--</option>
                            <?php
                            include("conexion.php");

                            $sql = "select idcategoria, nombrecategoria, activo, prefijo from categoria where activo = 1";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["idcategoria"] . "'>" . $row["nombrecategoria"] . "</option>";
                              }
                            } else {
                              echo "0 results";
                            }

                            mysqli_close($conn);
                            ?>
                          </select>

                        </div>
                        <div class="form-group">
                          <label for="claveproducto">Clave de producto:</label>
                          <input type="text" readonly class="form-control" name="claveproducto" id="claveproducto" value="" placeholder="Clave de producto.">
                        </div>
                        <div class="form-group">
                          <label for="nombreproducto">Nombre de producto:</label>
                          <input type="text" class="form-control" name="nombreproducto" id="nombreproducto" value="" placeholder="Nombre de producto">
                        </div>
                        <div class="form-group">
                          <label for="descripcionproducto">Descripción del producto:</label>
                          <input type="text" class="form-control" name="descripcionproducto" id="descripcionproducto" value="" placeholder="Descripción del producto.">
                        </div>
                        <!--div class="form-group">
                          <label for="urlfoto">URL Foto:</label>
                          <input type="text" class="form-control" name="urlfoto" id="urlfoto" value="" placeholder="URL de Foto.">
                        </div-->
                        <div class="form-group">
                          <label for="urlfoto">Foto:</label>
                          <input readonly type="text" class="form-control" value="foto.png" />
                          <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" value="" placeholder="URL de Foto.">
                        </div>



                        <?php
                        $chequeado = "";
                        /*if ($activo == 1) {
                          $chequeado = "checked";
                        }*/
                        ?>
                        <div class="form-check">
                          <input <?= $chequeado ?> type="checkbox" class="form-check-input" id="activo" name="activo">
                          <label class="form-check-label" for="activo">Activo.</label>
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="./plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="./plugins/jszip/jszip.min.js"></script>
  <script src="./plugins/pdfmake/pdfmake.min.js"></script>
  <script src="./plugins/pdfmake/vfs_fonts.js"></script>
  <script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>