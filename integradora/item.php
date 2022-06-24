<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Pizza Time !</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Regresar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Nosotros</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sucursales</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Sombrerete</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Juriquilla</a></li>
                            <li><a class="dropdown-item" href="#!">Milenio 3</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <?php
                include("./admin/conexion.php");
                $sql = "select * from producto inner join inventario on inventario.idproducto = producto.idproducto where md5(producto.idproducto) = '" . $_REQUEST["idprod"] . "'";
                //echo $sql;
                $result = mysqli_query($conn, $sql);
                $idproducto = 0;
                $nombreproducto = "";
                $precioproducto = 0;
                $descripcionproducto = "";
                $urlfoto = "";
                $inventario = 0;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idproducto = $row["idproducto"];
                        $nombreproducto = $row["nombreproducto"];
                        $precioproducto = $row["precio"];
                        $descripcionproducto = $row["descripcionproducto"];
                        $urlfoto = $row["urlfoto"];
                        $inventario = $row["cantidad"];
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                ?>
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= $urlfoto ?>" alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: <?= $_REQUEST["idprod"] ?></div>
                    <h1 class="display-5 fw-bolder"><?= $nombreproducto ?></h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through"><?php echo $precioproducto * 1.13 ?></span>
                        <span>$<?= $precioproducto ?></span>
                    </div>
                    <p class="lead"><?= $descripcionproducto ?></p>
                    <form action="" method="post" cause>
                        <div class="d-flex">
                            <input required class="form-control text-center me-3" id="inputQuantity" type="number" value="0" min="1" max="<?= $inventario ?>" style="max-width: 5rem" />
                            <input type="submit" value="Comprar" class="btn btn-outline-dark flex-shrink-0">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                include("./admin/conexion.php");
                $sql = "select * from producto as p inner join inventario as i on i.idproducto = p.idproducto order by rand() limit 4";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    //var_dump($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        //var_dump($row);
                        echo '<div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="' . $row["urlfoto"] . '" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">' . $row["nombreproducto"] . '</h5>
                                    $' . $row["precio"] . '
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>';
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                ?>



            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>