<?php
session_start();
require_once "connect.php";
const SYSTEM = "Ksiegarnia";

if (!isset($_SESSION['zalogowany'])) {
    //	header('Location: index.php');
    //	exit();
}

$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Księgarnia Brzoza</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Księgarnia Brzoza</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Strona główna
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">O nas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=acc">Konto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Kontakt</a>
                </li>
                <?php
                if (isset($_SESSION["loggedin"])) {
                    echo "<p>Witaj " . $_SESSION['username'] . '<li class="nav-item">! [ <a href="logout.php">Wyloguj się!</a> ]</li></p>';
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='index.php?page=register'>! [ Zarejestruj ] !</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='index.php?page=login'>! [ Zaloguj ] !</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Kategorie</h1>
            <div class="list-group">
                <a href="#" class="list-group-item">Informatyka</a>
                <a href="#" class="list-group-item disabled">Fantasy</a>
                <a href="#" class="list-group-item disabled">Hostoria</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <?php
                $page = @$_GET['page'];

                if (!strlen($page))
                    $page = "glowna";
                else if (!is_file("pages/{$page}.php"))
                    $page = "blad";

                include_once "pages/{$page}.php";
            ?>

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Księgarnia stopka</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
