<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">Pizza Time</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                <?php
                include("./admin/conexion.php");

                $sql = "select * from categoria";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="nav-item"><a class="nav-link" href="index.php?idcat=' . md5($row["idcategoria"]) . '">' . $row["nombrecategoria"] . '</a></li>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </ul>
            <form class="d-flex">
                <?php

                if (isset($_SESSION["nomcliente"])) {
                    $carrito = $_SESSION["sCarrito"];
                    $cuentaCarrito = 0;
                    foreach ($carrito as $x => $x_value) {
                        $cuentaCarrito += $x_value;
                    }
                    echo '<a href="carrito.php" class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">' . $cuentaCarrito . '</span>
                </a>';
                } else {
                    echo '<a href="./admin/index.php?usr=0" class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Iniciar Sesión
                    </span>
                </a>';
                }


                ?>

            </form>
        </div>
    </div>
</nav>