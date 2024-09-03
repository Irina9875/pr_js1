<?php

$iri = $connection->query("SELECT * FROM `iri` ")->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="admin-bl">
        <div class="admin">

            <div class="panel">
                <div class="panel-block">
                    <div class="panel-logo">
                        <a href="?page=main"> <img src="assets/img/glavnaii/лого.svg" alt=""></a>
                    </div>
                    <div class="profile">
                        <div class="foto-admin"><img src="<?= $user['img'] ?>" alt=""></div>
                        <div class="profile-info">
                            <h5><?= $user['name'] ?> <br> <?= $user['surname'] ?></h5>
                            <h6><?= $user['email'] ?></h6>
                        </div>
                    </div>
                    <div class="tovar__btn">
                        <a href="?page=admin">Пользователи</a>
                        <a href="?page=admin_tovar">Товары</a>
                        <a href="?page=addition">Добавить товар</a>
                    </div>
                    <div class="admin_exit">
                        <a href="?page=main">Выйти</a>
                    </div>
                </div>

            </div>
        </div>
        <header class="header_420">
            <div class="header-block container">
                <div class="header-logo">
                    <a href="?page=main"> <img src="assets/img/header/logo/KIKI.png" alt=""></a>
                </div>
                <input type="checkbox" id="burger" class="container">
                <label for="burger"></label>
                <nav class="burg-admin">
                    <div class="profile">
                        <div class="<?= $user['img'] ?>"></div>
                        <div class="profile-info">
                        <h5><?= $user['name'] ?> <br> <?= $user['surname'] ?></h5>
                          
                            <h6><?= $user['email'] ?></h6>
                        </div>
                    </div>
                    <div class="list">
                        <a href="?page=admin">Пользователи</a>
                        <a href="?page=admin_tovar">Товары</a>
                        <a href="?page=addition">Добавить товар</a>
                    </div>
                    <div class="admin_exit">
                        <a href="?page=main">Выйти</a>
                    </div>
                </nav>
            </div>
        </header>


        <div class="admin-bloc">
            <h3>Панель администратора</h3>
            <p class="none">Здравствуйте, <?= $user['name'] ?>!</p>
            <div class="cards">
                <h5>Товары</h5>
                <div class="cards-tovar">
                    <?
                    foreach ($iri as $iri) {
                        ?>
                         <div class="polzovalel_admin">
                        <div class="card-tovar">
                            <img src="<?= $iri['photo'] ?>" alt="">
                            <h6><?= $iri['name'] ?></h6>
                            <div class="btn_admin_tovar">
                                <div class="btn_edit">
                                    <a href="?page=edit&edit_id=<?= $iri['id'] ?>">Редактировать</a>
                                </div>
                                <div class="btn_delete">
                                    <a href="?page=delete&delete_id=<?= $iri['id'] ?>">Удалить</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    <? } ?>
                </div>
            </div>

        </div>

    </div>

</body>

</body>

</html>