<?php
$error_email = '';
$error_name = '';
$error_opisanine = '';
$error_presence = '';
$error_price = '';
$error = '';
$error_check = '';

if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $iri = $connection->query("SELECT * FROM `iri` WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['editPost'])) {
    $name = $_POST["name"];
    $opisanine = $_POST["opisanine"];
    $price = $_POST["price"];
    $presence = $_POST["presence"];

    // if ($_FILES['file']['size'] > 2 * 1024 * 1024) {
    //     $error .= 'слишком большой размер файла';
    // }

    // if ($_FILES['file']['type'] != 'image/jpg' && $_FILES['file']['type'] != 'image/png') {
    //     $error .= 'неправильный формат файла, должен быть png или jpg';
    // }

    $route1 = 'assets/img/' . time() . $_FILES['file1']['name'];
    $route2 = 'assets/img/' . time() . $_FILES['file2']['name'];
    $route3 = 'assets/img/' . time() . $_FILES['file3']['name'];
    $route4 = 'assets/img/' . time() . $_FILES['file4']['name'];

    if (empty(($name))) { 
 
        $error_name .= '<div class="error_name">Введите название товара!</div>'; 
 
    } 
    if (empty(($price))) { 
 
        $error_price .= '<div class="error_name">Введите цену товара!</div>'; 
 
    } 
    if (empty(($presence))) { 
 
        $error_presence .= '<div class="error_name">Введите наличие товара!</div>'; 
 
    } 
    if (empty(($opisanine))) { 
 
        $error_opisanine .= '<div class="error_name">Введите описание товара!</div>'; 
 
    } 
    if (preg_match('/^\D+$/i', $price)) { 
        $error_price .= '<div class="error_name">Можно вводить только цифры!</div>'; 
 
    } 

    if (preg_match("/^.*([0-9])+.*$/", $name)) { 
 
        $error_name .= '<div class="error_name">Можно вводить только буквы!</div>'; 
 
    } 
    if (preg_match('/^\D+$/i', $presence)) { 
        $error_presence .= '<div class="error_name">Можно вводить только цифры!</div>'; 
 
    } 



    if ($error == '') {
        if (move_uploaded_file($_FILES['file1']['tmp_name'], $route1) && move_uploaded_file($_FILES['file2']['tmp_name'], $route2) && move_uploaded_file($_FILES['file3']['tmp_name'], $route3) && move_uploaded_file($_FILES['file4']['tmp_name'], $route4)) {
            $connection->query("UPDATE `iri` SET `name`='$name',`opisanine`='$opisanine',`presence`='$presence',`price`='$price',`photo`='$route1',`img2`='$route2',`img3`='$route3' WHERE id={$_GET['edit_id']}");

        } else {
            $error .= "ошибка загрузки изоражения";
        }
        header('Location: ?page=admin_tovar'); 
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование товара</title>
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
                            <h5><?= $user['name'] ?></h5>
                            <h5><?= $user['surname'] ?></h5>
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
                        <div class="foto-admin"></div>
                        <div class="profile-info">
                            <h5>Имя Фамилия</h5>
                            <h6>Почта</h6>
                        </div>
                    </div>
                    <div class="list">
                        <a href="?page=admin">Пользователи</a>
                        <a href="?page=admin_tovar">Товары</a>
                        <a href="?page=addition">Добавить товар</a>
                    </div>
                    <div class="admin_exit">
                        <a href="?page=index"><img src="assets/img/admin/exit.png" alt=""> </a>
                    </div>
                </nav>
            </div>
        </header>


        <div class="delete-block">
            <!-- delete start -->

            <!-- edit start -->
            <div class="regist">
                <div class="regist-block content">
                    <h2>Редактировать товар</h2>
                    <div class="regist-form">
                        <form method="post" name="editPost" class="form_dobav" enctype="multipart/form-data">
                            <input class="form" type="text" value="<?= $iri['name'] ?>" name="name"
                                placeholder="Название товара">
                                <?= $error_name ?>
                            <input class="form" type="text" value="<?= $iri['opisanine'] ?>" name="opisanine"
                                placeholder="Описание товара">
                                <?= $error_opisanine ?>
                            <input class="form" type="text" value="<?= $iri['presence'] ?>" name="presence"
                                placeholder="Наличие товара">
                                <?= $error_presence ?>
                            <input class="form" type="text" value="<?= $iri['price'] ?>" name="price"
                                placeholder="Цена товара">
                                <?= $error_price ?>
                            <input class="form" type="file" value="<?= $iri['photo'] ?>" name="file1"
                                placeholder="Фото товара (центр)">
                            <input class="form" type="file" value="<?= $iri['img1'] ?>" name="file2"
                                placeholder="Фото товара (боковая)">
                            <input class="form" type="file" value="<?= $iri['img2'] ?>" name="file3"
                                placeholder="Фото товара (боковая)">
                            <input class="form" type="file" value="<?= $iri['img3'] ?>" name="file4"
                                placeholder="Фото товара (боковая)">
                                <?=$error?>
                            <input class="btn_edit" type="submit" name="editPost" value="Редактировать">
                        </form>
                    </div>
                </div>
            </div>
            <!-- edit end -->
        </div>
    </div>


</body>

</html>