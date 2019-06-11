<?php
function abc($name){
//your code here
}

if (!defined("SYSTEM")) header('Location: index.php');

$ksiazka = (int) addslashes(@$_GET['pokaz']);

$zamowienie = -2;

$result = mysqli_query($polaczenie, "SELECT * FROM `ksiazki` WHERE `id_ksiazki` = {$ksiazka}");
if ($result && $row = mysqli_fetch_assoc($result)) {

    $zamowienie = 0;
    if(isset($_GET['koszyk'])) {
        $stan = $row['stan'];

        //szukam ostatniego zamowienia danej ksiazki by pobrac aktualny stan
        $res = mysqli_query($polaczenie, "SELECT * FROM `zamowienia` WHERE `id_ksiazki` = {$ksiazka} ORDER BY data_zamowienia DESC");
        if ($res && $r = mysqli_fetch_assoc($result)) {
            $stan = $r['stan'];
        }

        if($stan-1 > 0) {
            if ($polaczenie->query("INSERT INTO zamowienia VALUES ('', '{$_SESSION["id_klienta"]}', '{$ksiazka}','" . date("Y-m-d H:i:s") . "', '".date('Y-m-d', strtotime("+7 day"))."', '" . "w realizacji" . "')")) {
                $zamowienie = 1;
            }
        } else {
            $zamowienie = -1;
        }
    }
?>

<div class="card mt-4">
    <img class="card-img-top" src="<?php echo $row['okladka']; ?>" alt="">
    <div class="card-body">
        <h3 class="card-title"><?php echo $row['nazwa']; ?></h3>
        <h3 class="card-title"><?php echo $row['autor']; ?></h3>
        <h4><?php echo $row['cena']; ?> zł
            <?php
            switch($zamowienie) {
                case 0:
                    echo '<a href="index.php?page=ksiazka&pokaz='.$ksiazka.'&koszyk" class="btn btn-lg btn-primary">Dodaj do koszyka</a>';
                    break;
                case 1:
                    echo '<b>Zamówienie zostalo złożone</b>';
                    break;
                case -1:
                    echo '<b>Brak książki na stanie</b>';
                    break;
                default:
                    echo '<b>Musisz się zalogować by złożyć zamówienie</b>';
                    break;
            }
            ?>
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