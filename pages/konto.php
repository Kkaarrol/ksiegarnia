<?php

	session_start();
	
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: login.php');
		exit();
	}
	

	$user = (int) addslashes(@$_GET['pokaz']);


	$result = mysqli_query($polaczenie, "SELECT login, Imie, Nazwisko, Adres, Telefon, email, password FROM klienci WHERE id_klienta = {$user}");
	if ($result && $row = mysqli_fetch_assoc($result)) {

?>



<div class="card mt-4">

    <div class="card-body">
        <h3 class="card-title"><?php echo $row['Imie']; ?></h3>
        <h3 class="card-title"><?php echo $row['Nazwisko']; ?></h3>
        <h4><?php echo $row['email']; ?>
            <button type="button" class="btn btn-lg btn-primary">Dodaj do koszyka</button>
        </h4>
       
    </div>
</div>

<?php } else { ?>
    <div class="card mt-4">
        <h1>Nie ma takiej książki w systemie :(</h1>
    </div>
<?php } ?>