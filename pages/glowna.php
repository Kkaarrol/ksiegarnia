<?php if (!defined("SYSTEM")) header('Location: index.php'); ?>

<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="img/slide1.jpg" alt="Księgarnia Brzoza">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="img/slide2.jpg" alt="Darmowe zwroty">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="img/slide3.jpg" alt="Satysfakcja zakupu">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="row">

    <?php
    $ksiazki = mysqli_query($polaczenie, "SELECT nazwa, autor, strony, cena, opis, okladka FROM ksiazki");
    while ($ksiazki && $ksiazka = mysqli_fetch_assoc($ksiazki)) { ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="index.php?page=ksiazka&pokaz=<?php print $ksiazka['id_ksiazki'] ?>">
                    <img class="card-img-top" src="<?php print $ksiazka['okladka'] ?>" alt="img/books/symfonia.jpg">
                    <div class="card-body">
                        <h4 class="card-title">
                            <!-- <a href="#">Symfonia C++</a> -->
                            <span> <?php print $ksiazka['nazwa'] ?> </span>
                        </h4>
                        <h5>$<?php print $ksiazka['cena'] ?></h5>
                        <p class="card-text"> <?php print $ksiazka['opis'] ?> </p>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>

</div>
<!-- /.row -->