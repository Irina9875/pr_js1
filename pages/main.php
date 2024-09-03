<?

$kollect = $connection->query("SELECT * FROM `kollect` ")->fetchAll(PDO::FETCH_ASSOC);

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
   
    <!-- НАЧАЛО БАННЕРА -->
     <section>
        <div class=" banner content">
            <div class="text__banner">
                <h1 >NATURAL</h1>
                <h1 class="glav__banner">ORGANIC</h1>
                <h1 >BRAND</h1>
                <div class="button__banner">
                    <a href="?page=katalog">Перейти в каталог</a>
                </div>
            </div>
            <div class="foto__banner">
                <img src="assets/img/glavnaii/banner.png" alt="">
            </div>
        </div>
     </section>
    <!-- КОНЕЦ БАННЕР -->
    <div class="str"></div>
    <section>
        <div class="content">
            <h2>Наша коллекция</h2>
            <div class="kollecshion">
            <?
                        foreach ($kollect as $kollect) {
                        ?>
                <div class="kart__kollecshion">
                   <a href="#"> <img src="<?=$kollect['img']?>" alt=""></a>
                    <div class="text__kollechion">
                    <h3><?=$kollect['name']?></h3>
                    <h4><?=$kollect['price']?> ₽</h4>
                </div>
                </div>
                <? }

?>
            </div>
        </div>
    </section>
    <!-- КОНЕЦ КОЛЛЕКЦИИ -->

    <!-- НАЧАЛО КАТЕГОРИЙ -->
        <div class="kategoria content">
            <div class="kategirii__vse">
                <img src="assets/img/glavnaii/kategoria.png" alt="">
                <div class="kategorii_odin">
                    <img src="assets/img/glavnaii/kategoriavolos.png" alt="">
                    <img src="assets/img/glavnaii/kategoriamakiag.png" alt="">
                </div>
            </div>
        </div>
    <!-- КОНЕЦ КАТЕГОРИЙ -->

     
</body>
</html>