<?
$iri = $connection->query("SELECT * FROM `iri` ")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/glavnaii/лого.svg" type="image/x-icon">
    <title>NUDE</title>
</head>

<body>


    <!-- НАЧАЛО КАТАЛОГА -->
    <section>
        <div class="katalog content">
            <div class="rows none containera">
                <div class="rowa">ДЛЯ ТЕЛА</div>
                <div class="row">ДЛЯ ЛИЦА</div>
                <div class="row">ДЛЯ ВОЛОС</div>
                <div class="row">МАКИЯЖ</div>
                <div class="row">ОРГАНИКА</div>
            </div>
            <div class="fil_420">

                <div class="fil-txt">
                    <input type="checkbox" id="filter" class="container">
                    <label for="filter"></label>
                    <nav class="fil">
                        <div class="rowa">ДЛЯ ТЕЛА</div>
                        <div class="row">ДЛЯ ЛИЦА</div>
                        <div class="row">ДЛЯ ВОЛОС</div>
                        <div class="row">МАКИЯЖ</div>
                        <div class="row">ОРГАНИКА</div>
                    </nav>
                </div>
            </div>

            <div class="katalog_kart">
                <?
                foreach ($iri as $iri) {
                    ?>
                    <div class="katalog_kart_odin">
                        <div class="img__kart">
                            <img class="katakig_img" src="<?= $iri['photo'] ?>" alt="">
                        </div>
                        <h3><?= $iri['name'] ?></h3>
                        <div class="info__kart">
                            <h4><?= $iri['price'] ?> ₽</h4>
                            <a href="?page=kartochka&id=<?= $iri['id'] ?>"> <img src="assets/img/katalog/dobav.svg"
                                    alt=""></a>
                        </div>

                    </div>
                <? }

                ?>


            </div>

            <div class="rows">
                <div class="rov">1</div>
                <div class="ro">2</div>
                <div class="ro">3</div>
                <div class="ro">4</div>
                <div class="ro">5</div>
            </div>
        </div>
    </section>
    <!-- КОНЕЦ КАТАЛОГА -->


</body>

</html>