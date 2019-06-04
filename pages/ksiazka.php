<?php
if (!defined("SYSTEM")) header('Location: index.php');

$ksiazka = (int) addslashes(@$_GET['pokaz']);

$result = mysqli_query($polaczenie, "SELECT nazwa, autor, strony, cena, opis, okladka FROM ksiazki WHERE id_ksiazki = {$ksiazka}");
if ($result && $row = mysqli_fetch_assoc($result)) {
?>

<div class="card mt-4">
    <img class="card-img-top" src="<?php echo $row['okladka']; ?>" alt="">
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
        <p>Świetna książka, C++ jest moim pierwszym językiem programowania, a mimo to wszystko rozumiem. Panie
            Grębosz Dzię-ku-je-my ! :)</p>
        <small class="text-muted">Andrzej 3/1/17</small>
        <hr>
        <p>Od tej książki zacząłem przygodę z programowaniem. Chyba jedyna książka na temat C++, która nie jest
            "sucha", to znaczy nie jest napisana technologicznym bełkotem, a przeciwnie, czyta się ją bardzo
            przyjemnie, a jednocześnie jest wyczerpującym źródłem w kwestii nauki podstaw tego języka.</p>
        <small class="text-muted">Zbigniew Anonymous on 3/1/17</small>
        <hr>
        <p>BARDZO POLECAM TĄ POZYCJĘ DLA POCZĄTKUJĄCYCH - ta książka nie ma sobie równych</p>
        <small class="text-muted">Angela 3/1/17</small>
        <hr>
        <a href="#" class="btn btn-success">Zostaw komentarz!</a>
    </div>
</div>
<!-- /.card -->
<?php } else { ?>
    <div class="card mt-4">
        <h1>Nie ma takiej książki w systemie :(</h1>
    </div>
<?php } ?>