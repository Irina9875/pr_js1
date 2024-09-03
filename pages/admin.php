<?
$users = $connection->query("SELECT * FROM users ")->fetchAll(PDO::FETCH_ASSOC);
if (!isset($_SESSION['uid'])) {

    header('Location: ?page=main');

} 

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
                    <a href="?page=admin_tovar">Выйти</a>
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
                        <a href="?page=admin_tovar">Выйти</a>
                    </div> 
                </nav> 
            </div> 
        </header>
        
        <div class="admin-bloc">
            <h3>Панель администратора</h3>
            <p class="none">Здравствуйте, Админ!</p>
             <div class="pozovalel">
                <h3>Пользователи</h3>
                <?
                    foreach ($users as $user) { ?>
                <div class="polzovalel_admin">
                    <a href=""><?= $user['id'] ?></a>
                    <a href=""><?= $user['name'] ?></a>
                    <a href=""><?= $user['surname'] ?></a>
                    <a href=""><?= $user['email'] ?></a>
                    <? if ($user['level'] != 0 && $user['level'] != 2) { ?>
                                <a href="?page=admin&ban_id=<?= $user['id'] ?>" class="btn_admin_user">Заблокировать</a>
                                       
                            <? } elseif ($user['level'] != 2 && $user['level'] == 0) { ?>
                                <a href="?page=admin&up_id=<?= $user['id'] ?>" class="btn_admin_user">Повысить</a>
                            <? } ?>
                </div>
                <? } ?>
             </div>
  
            
            
            
           
        </div>
    </div>
  
</body>

</html>