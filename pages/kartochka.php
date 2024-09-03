<?php

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $iri = $connection->query("SELECT * FROM `iri` WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
}

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
    <section>
        <div class="kartochka content">
          
                <div class="img__kart">
                    <div class="img_kart_glav">
                        
                        <div class="img_kartochki">
                            <img src="<?= $iri['img1'] ?>" alt="">
                            <img src="<?= $iri['img2'] ?>" alt="">
                            <img src="<?= $iri['img3'] ?>" alt="">
                        </div>
                        <div class="glav_img_kart">
                            <img src="<?= $iri['photo'] ?>" alt="">
                        </div>
                    </div>
                    <div class="info__kartochka">
                        <h3><?= $iri['name'] ?></h3>
                        <div class="infografika_kart">
                            <div class="infografika">
                                <img src="assets/img/kartochka/free.png" alt="">
                                <p>Бесплатная доставка</p>
                            </div>
                            <div class="infografika">
                                <img src="assets/img/kartochka/almaz.png" alt="">
                                <p>Гарантия качества</p>
                            </div>
                        </div>
                        <div class="opisanie_kart">
                            <p>Описание:</p>
                            <h5><?= $iri['opisanine'] ?></h5>
                        </div>
                        <div class="nalivii">
                            <p>В наличие</p>
                            <p> <br><?= $iri['presence'] ?> штук</p>
                        </div>
                        <div class="price_kart">
                            <h5><?= $iri['price'] ?></h5>
                            <a href="?page=korzina"> <img src="assets/img/kartochka/plus.svg" alt=""></a>
                        </div>
                    </div>
                </div>
          
        </div>
    </section>

</body>

</html>