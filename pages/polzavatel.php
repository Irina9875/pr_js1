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

     <section class="content">
        <h2 class="col">СТРАНИЦА ПОЛЬЗОВАТЕЛЯ</h2>
        <div class="polzvatel">
            
            <div class="img_polzv_login">
            <img src="<?= $user['img'] ?>" alt="">
                <div class="login_polzovatel">
                    <p><?= $user['name'] ?></p>
                    <p><?= $user['surname'] ?></p>
                    <p><?= $user['email'] ?></p>
                    <a href="?page=edit_user&edit_id=<?= $user['id']?>">Редактировать</a>
                </div>
            </div>
            <div class="zakaz__polzovatel">
                <h3>ЗАКАЗЫ</h3>
                <div class="itog_zakaz">
                    <div class="itog_zakaz__odin">
                        <p>Номер заказа</p>
                        <h5>325678</h5>
                    </div>
                    <div class="itog_zakaz__odin">
                        <p>Количество товара</p>
                        <h5>5шт</h5>
                    </div>
                    <div class="itog_zakaz__odin">
                        <p>Сумма товаров</p>
                        <h5>6 700 ₽</h5>
                    </div>
                </div>
            </div>
        </div>
     </section>

            
</body>
</html>