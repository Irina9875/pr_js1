<?php

$error_email = "";
$error_name = "";
$error_surname = "";
$error_password = "";
$error_password_repeat = "";
$error_img = "";
$agree = "";


if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    $checkUser = $connection->query("SELECT * FROM `users` WHERE email='$email'")->fetch(PDO::FETCH_ASSOC);



    if (!empty($checkUser)) {

        $error_email .= '<div class="error">Данная почта уже зарегистрирована!</div>';
    }

    if (empty(($name))) {

        $error_name .= '<div class="error">Введите Имя!</div>';

    } else if (strlen($name) < 2) {

        $error_name .= '<div class="error">Имя не должно быть меньше 2 символов!</div>';
    }

    if (empty($email)) {

        $error_email .= '<div class="error">Введите Email!</div>';

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error_email .= '<div class="error">Неверный формат Email!</div>';

    }
    if (empty($password)) {

        $error_password .= '<div class="error">Введите пароль!</div>';

    } else if (strlen($password) < 6) {

        $error_password .= '<div class="error">Пароль не должен быть меньше 6 символов!</div>';

    }
    if ($password != $password_repeat) {

        $error_password_repeat .= '<div class="error">Пароли не совпадают!</div>';
    }
    if (empty($surname)) {

        $error_surname .= '<div class="error">Введите фамилию!</div>';
    }
    
    if ($error_name === '' && $error_email === '' && $error_password === '' && $error_password_repeat === '' && $agree === "") {

                
                $pass_md5 = md5($password);
                var_dump($pass_md5);
                // $connection->query("INSERT INTO `users` (`name`, `surname`, `email`, `password`, `img`) VALUES ('$name','$surname','$email','$pass_md5','$route')");
                $connection->query("INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `level`, `img`) VALUES (NULL, '$name', '$surname', '$email', '$pass_md5', '1', '$route')");

                echo '<div class="error">Вы зарегистрированы!</div>';

                // header("Location: ?page=main");

            } else {
                $error_img .= "Ошибка загрузки изображения";
            }
        }

        header('Location: ?page=login'); 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- regist start -->
    <div class="regist">
        <div class="registrati content">
            <h2>Регистрация</h2>
            <div class="regista-form">
                
            <form class="form_regista" method="POST" name="reg" enctype="multipart/form-data">
                
                <input class="form" type="text" name="name" placeholder="Имя" value="<?php if (isset($_POST['reg'])) {
                    echo $_POST['name'];
                } ?>">
                <?= $error_name ?>
                <input class="form" type="text" name="surname" placeholder="Фамилия" value="<?php if (isset($_POST['reg'])) {
                    echo $_POST['surname'];
                } ?>">
                        <?= $error_surname ?>
                <input class="form" type="file" name="file" placeholder="Фото">
                <?= $error_img ?>
                <input class="form" type="text" name="email" placeholder="Почта" value="<?php if (isset($_POST['reg'])) {
                    echo $_POST['email'];
                } ?>">
                <?= $error_email ?>
                <input class="form" type="text" name="password" placeholder="Пароль" >
                <?= $error_password ?>
                <input class="form" type="text" name="password_repeat" placeholder="Подтверждение пароля" >
                <?= $error_password_repeat ?>
                </div>
                <div class="chek-log">
                    <input type="checkbox" name="agree" class="gal">
                    <p class="chek-text" href="">Cогласен на обработку данных</p>
                </div>
                <?if(!empty($agree)){echo $agree;}?>
                
                <input class="btn_regist" type="submit" name="reg" value="Зарегистрироваться">
            </form>
            </div>
        </div>
        <div class="regista-info">
            <p>Уже зарегистрированы?</p> <a href="?page=login">Войти</a>
        </div>
    </div>
    <!-- regist end -->
    <div class="str__nam"></div>
</body>

</html>