<?php

	session_start();
	
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: login.php');
		exit();
	}

	if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT zamowienia.id_zamowienia,zamowienia.data_zamowienia, zamowienia.data_dostarczenia, zamowienia.stan, ksiazki.nazwa, ksiazki.cena FROM zamowienia, ksiazki WHERE ksiazki.id_ksiazki = zamowienia.id_ksiazki;";
	


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
        <h1>error:(</h1>
    </div>
<?php } ?>