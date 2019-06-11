<?php

	session_start();
	
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: login.php');
		exit();
	}
	
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
      <a class="navbar-brand" href="index.php">Twoje konto</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Strona główna
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">O nas</a>
          </li>
          <li class="nav-item">
            <a class="nav-item active" href="konto.php">Konto</a>
			<span class="sr-only">(current)</span>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Kontakt</a>
          </li>
		  <li class "nav-item">
		  
		 <?php 
		if (isset($_SESSION["username"])) {
		 echo "<p>Witaj ".$_SESSION['username'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>'; 
		}
		else
		{
			 echo "".'! [ <a href="register.php">Zarejestruj!</a> ]'; 
			  echo "".'! [ <a href="login.php">Zaloguj!</a> ]</p>';
		}
		 ?>
		  </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Opcje</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Dane konta</a>
          <a href="#" class="list-group-item disabled">Zamówienia</a>
          <a href="#" class="list-group-item disabled">Historia</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->



    </div>
    <!-- /.row -->
  <div class="col-lg-9">
<form method="post">
	<div class="form-group">
		Login: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_nick']))
			{
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
		?>" name="nick" /><br />
		</div>
		<?php
			if (isset($_SESSION['e_nick']))
			{
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
		?>
		<div class="form-group">
		E-mail: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>" name="email" /><br />
		</div>
		<?php
			if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
		?>
		<div class="form-group">
		Imie: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_imie']))
			{
				echo $_SESSION['fr_imie'];
				unset($_SESSION['fr_imie']);
			}
		?>" name="imie" /><br />
		</div>
		<div class="form-group">
		Nazwisko: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_nazwisko']))
			{
				echo $_SESSION['fr_nazwisko'];
				unset($_SESSION['fr_nazwisko']);
			}
		?>" name="nazwisko" /><br />
		</div>
		<div class="form-group">
				Adres: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_adres']))
			{
				echo $_SESSION['fr_adres'];
				unset($_SESSION['fr_adres']);
			}
		?>" name="adres" /><br />
		</div>
		<div class="form-group">
				Telefon: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_telefon']))
			{
				echo $_SESSION['fr_telefon'];
				unset($_SESSION['fr_telefon']);
			}
		?>" name="telefon" /><br />

		</div>
		<div class="form-group">
		Twoje hasło: <br /> <input type="password"  value="<?php
			if (isset($_SESSION['fr_haslo1']))
			{
				echo $_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
		?>" name="haslo1" /><br />
		
		<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>		
		</div>
		
		

		<br />
		
		<input type="submit" value="Potwierdź zmiany" />
		
	</form>




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
