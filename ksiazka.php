<?php


require_once "connect.php";
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
$query = "SELECT nazwa, autor, strony, cena, opis FROM ksiazki WHERE id_ksiazki = 1";
  $result = mysqli_query($polaczenie, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($polaczenie);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $title = $row['nazwa'];
	

?>
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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Strona główna
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">O nas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Konto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Kontakt</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

   

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top" src="img/books/symfonia.jpg" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $row['nazwa']; ?></h3>
			<h3 class="card-title"><?php echo $row['autor']; ?></h3>
            <h4><?php echo $row['cena']; ?> zł
            <button type="button" class="btn btn-lg btn-primary">Dodaj do koszyka</button>
            </h4>
            <p class="card-text"><?php echo $row['opis']; ?></p>
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Recenzje
          </div>
          <div class="card-body">
            <p>Świetna książka, C++ jest moim pierwszym językiem programowania, a mimo to wszystko rozumiem. Panie Grębosz Dzię-ku-je-my ! :)</p>
            <small class="text-muted">Andrzej 3/1/17</small>
            <hr>
            <p>Od tej książki zacząłem przygodę z programowaniem. Chyba jedyna książka na temat C++, która nie jest "sucha", to znaczy nie jest napisana technologicznym bełkotem, a przeciwnie, czyta się ją bardzo przyjemnie, a jednocześnie jest wyczerpującym źródłem w kwestii nauki podstaw tego języka.</p>
            <small class="text-muted">Zbigniew Anonymous on 3/1/17</small>
            <hr>
            <p>BARDZO POLECAM TĄ POZYCJĘ DLA POCZĄTKUJĄCYCH - ta książka nie ma sobie równych</p>
            <small class="text-muted">Angela 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Zostaw komentarz!</a>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

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
