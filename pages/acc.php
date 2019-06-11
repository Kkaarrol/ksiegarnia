<?php

	session_start();
	
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: login.php');
		exit();
	}
	
	
//	require_once "config.php";

echo $_SESSION['id_klienta'];
	if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT zamowienia.id_zamowienia, zamowienia.data_zamowienia, zamowienia.data_dostarczenia, zamowienia.stan, ksiazki.nazwa, ksiazki.cena FROM zamowienia, ksiazki WHERE id_klienta = 16 AND ksiazki.id_ksiazki = zamowienia.id_ksiazki;";
	
	
	

		if (isset($_SESSION["username"])) {
		 echo "<p>Witaj ".$_SESSION['username'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>'; 
		}
		else
		{
			 echo "".'! [ <a href="register.php">Zarejestruj!</a> ]'; 
			  echo "".'! [ <a href="login.php">Zaloguj!</a> ]</p>';
		}
		 ?>
		 <html>
		  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Księgarnia Brzoza</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet">
		 <head>
		 </head>
		 <body>
	
  <div class="col-lg-9">
<form method="post">
	<div class="form-group">
		Login: <br /> <input type="text" value="<?php
			if (isset($_SESSION['username']))
			{
				echo $_SESSION['username'];
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
			if (isset($_SESSION['email']))
			{
				echo $_SESSION['email'];
				//unset($_SESSION['fr_email']);
			}
		?>" name="email" /><br />
		</div>
		<div class="form-group">
		Imie: <br /> <input type="text" value="<?php
			if (isset($_SESSION['Imie']))
			{
				echo $_SESSION['Imie'];
			//	unset($_SESSION['Imie']);
			}
		?>" name="imie" /><br />
		</div>
		<div class="form-group">
		Nazwisko: <br /> <input type="text" value="<?php
			if (isset($_SESSION['Nazwisko']))
			{
				echo $_SESSION['Nazwisko'];
			//	unset($_SESSION['Nazwisko']);
			}
		?>" name="nazwisko" /><br />
		</div>
		<div class="form-group">
				Adres: <br /> <input type="text" value="<?php
			if (isset($_SESSION['Adres']))
			{
				echo $_SESSION['Adres'];
			//	unset($_SESSION['Adres']);
			}
		?>" name="adres" /><br />
		</div>
		<div class="form-group">
				Telefon: <br /> <input type="text" value="<?php
			if (isset($_SESSION['Telefon']))
			{
				echo $_SESSION['Telefon'];
			//	unset($_SESSION['Telefon']);
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
		<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "bookshop");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
//$sql = "SELECT * FROM Zamowienia";
// $sql = "SELECT zamowienia.id_zamowienia, zamowienia.data_zamowienia, zamowienia.data_dostarczenia, zamowienia.stan, ksiazki.nazwa, ksiazki.cena FROM zamowienia, ksiazki WHERE id_klienta = 16 AND ksiazki.id_ksiazki = zamowienia.id_ksiazki;";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id_zamowienia</th>";
                echo "<th>data_zamowienia</th>";
				echo "<th>data_dostarczenia</th>";
				echo "<th>stan</th>";
				echo "<th>nazwa</th>";
				echo "<th>cena</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id_zamowienia'] . "</td>";
				echo "<td>" . $row['data_zamowienia'] . "</td>";
                echo "<td>" . $row['data_dostarczenia'] . "</td>";
				echo "<td>" . $row['stan'] . "</td>";
				echo "<td>" . $row['nazwa'] . "</td>";
				echo "<td>" . $row['cena'] . "</td>";
				
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
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



<?php } else { ?>
    <div class="card mt-4">
        <h1>Nie ma takiej książki w systemie :(</h1>
    </div>
<?php } ?>
 