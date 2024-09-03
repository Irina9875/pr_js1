<?php



if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $del_tovar = $connection->query("SELECT * FROM iri WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET['delete_id'])) {
    $del_id = $_GET['delete_id'];

    $connection->query("DELETE FROM iri WHERE id=$del_id");

    header('Location: ?page=admin_tovar');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление товара</title>
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
                        <a href="?page=main"> </a>
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
                            <a href="?page=main"><img src="assets/img/admin/exit.png" alt=""> </a> 
                            <a href="?page=main">Выйти</a> 
                        </div> 
                    </nav> 
                </div> 
            </header>
        
    
    
                     <!-- delete start -->
        <div class="delete conent">
            <h2>Удаление товара</h2>
            <div class="info-delete">
                <p>Вы действительно хотите удалить товар? <?= $iri['name'] ?></p>
            </div>
            <div class="delete-btn">
             <a href="?page=main" class="btn-cancel">Отменить</a>
                <a href="?page=delete&delete_id=<?=$del_tovar['id']?>" class="btn-delete">Удалить</a>
            </div>
            

        </div>

    <!-- delete end -->
           

   


</body>

</html>