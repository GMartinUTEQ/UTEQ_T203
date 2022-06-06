<!DOCTYPE html>
<html lang="en">

<head>
    <title>La pizza Nostra </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }
    </style>
</head>

<body>

    <div class="jumbotron" style="background-image:url('./admin/dist/uploadImgs/banner.png'); background-repeat: no-repeat; background-size: 100% 100%">
        <div class="container text-center">
            <h1>La pizza nostra</h1>
            <p>La mejor pizzería cerca de la UTEQ</p>
        </div>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img style="max-height:50px" src="./admin/dist/uploadImgs/logo.png">
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <?php

                    include("./admin/conexion.php");
                    $sql = "select * from categoria limit 5;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<li><a href=\"#\">" . $row["nombrecategoria"] . "</a></li>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();

                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">

            <?php

            include("./admin/conexion.php");
            $sql = "select * from producto;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">' . $row["nombreproducto"] . ' </div>
                                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                                <div class="panel-footer">' . $row["descripcionproducto"] . '</div>
                            </div>
                        </div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();

            ?>

        </div>
    </div><br><br>

    <footer class="container-fluid text-center">
        <p>Online Store Copyright</p>
        <form class="form-inline">Get deals:
            <input type="email" class="form-control" size="50" placeholder="Email Address">
            <button type="button" class="btn btn-danger">Sign Up</button>
        </form>
    </footer>

</body>

</html>