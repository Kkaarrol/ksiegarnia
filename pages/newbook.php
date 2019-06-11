<?php
	session_start();
	
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: login.php');
		exit();
	}
	
		
		$nazwa = $_POST['nazwa'];
		$autor = $_POST['autor'];
		$strony = $_POST['strony'];
		$cena = $_POST['cena'];
		$opis = $_POST['opis'];
		$stan = $_POST['stan'];
		$okladka = $_POST['okladka'];
	
	require_once "connect.php";
	if (isset($_POST['nazwa']))
	{
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				if ($polaczenie->query("INSERT INTO ksiazki (nazwa,autor,strony,cena,opis,stan,okladka) VALUES ('$nazwa', '$autor', '$strony','$cena', '$opis', '$stan', '$okladka')"))
					{
						//$_SESSION['udanarejestracja']=true;
						
					//	header('Location: index.php');
						 echo "<script>alert('Dodano książkę!');</script>";
						
					}
					else
					{	
						throw new Exception($polaczenie->error);
						echo "<script>alert('Failure.');</script>";
					}
					
				}
				
				$polaczenie->close();
			}
			
		
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o dodanie w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
	
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dodaj książkę</title>
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        
        <p>Dodaj nową książkę do bazy danych</p>
<form method="post">
	<div class="form-group">
		Nazwa: <br /> <input type="text" value="<?php
			if (isset($_SESSION['nazwa']))
			{
				echo $_SESSION['nazwa'];
			//	unset($_SESSION['nazwa']);
			}
		?>" name="nazwa" /><br />
		</div>

		<div class="form-group">
		Autor: <br /> <input type="text" value="<?php
			if (isset($_SESSION['autor']))
			{
				echo $_SESSION['autor'];
			//	unset($_SESSION['autor']);
			}
		?>" name="autor" /><br />
		</div>

		<div class="form-group">
		Strony: <br /> <input type="text" value="<?php
			if (isset($_SESSION['strony']))
			{
				echo $_SESSION['strony'];
			//	unset($_SESSION['strony']);
			}
		?>" name="strony" /><br />
		</div>
		<div class="form-group">
		cena: <br /> <input type="text" value="<?php
			if (isset($_SESSION['cena']))
			{
				echo $_SESSION['cena'];
			//	unset($_SESSION['cena']);
			}
		?>" name="cena" /><br />
		</div>
		<div class="form-group">
				opis: <br /> <input type="text" value="<?php
			if (isset($_SESSION['opis']))
			{
				echo $_SESSION['opis'];
			//	unset($_SESSION['opis']);
			}
		?>" name="opis" /><br />
		</div>
		
		<div class="form-group">
		stan: <br /> <input type="text"  value="<?php
			if (isset($_SESSION['stan']))
			{
				echo $_SESSION['stan'];
			//	unset($_SESSION['stan']);
			}
		?>" name="stan" /><br />
			
		</div>
		<div class="form-group">
		Okladka: <br /> <input type="text" value="<?php
			if (isset($_SESSION['okladka']))
			{
				echo $_SESSION['okladka'];
			//	unset($_SESSION['okladka']);
			}
		?>" name="okladka" /><br />
		</div>
		<div class="form-group">
		<br />
		
		<input type="submit" value="Dodaj książkę" />
		
	</form>
    </div>    
</body>
</html>	
	
	