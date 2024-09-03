<?php
$error = '';
$error_email = '';
$error_pass = '';


if (isset($_POST['auth'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass_md5 = md5($password);


    if ($password === '') {
        $error_pass .= '<div class="error">Введите пароль!</div>';
    }

    if (empty($email)) {

        $error_email .= '<div class="error">Введите Email!</div>';

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error_email .= '<div class="error">Неверный формат Email!</div>';

    } else {

        $checkUser = $connection->query("SELECT * FROM users WHERE email='$email'")->fetch(PDO::FETCH_ASSOC);
        if (empty($checkUser)) {

            $error_email .= '<div class="error">Эта почта не зарегистрирована!</div>';

        } else {

            $checkUser2 = $connection->query("SELECT * FROM users WHERE `email`='$email' AND `password`='$pass_md5'")->fetch(PDO::FETCH_ASSOC);
            if (empty($checkUser2)) {
                $error .= "Неверный email или пароль!";
            }

        }

    }

    if ($error_email === '' && $error_pass === '' && $error == '') {

        $_SESSION['uid'] = $checkUser2['id'];

        if ($checkUser2['level'] == 0) { 
            header('Location: ?page=ban'); 
        } else { 
    
            header('Location: ?page=main'); 
        }

    }
  


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    
    <!-- login start -->
    <div class="login">
        <div class="logina content">
            <h2>Авторизоваться</h2>
            <div class="login-form">
                <form class="forma_login" name="auth" method="POST">
                    <input type="text" placeholder="Email" name="email"
                    value="<?php if (isset($_POST['reg'])) { 
                        echo $_POST['email']; 
                    } ?>">
                    <?= $error_email ?>
                    <input class="text" type="password" placeholder="Пароль" name="password">
                    <?= $error_pass ?>
                    <input class="btn_login" name="auth" type="submit" value="Войти">
                </form>
            </div>
        </div>
        <div class="logina-info">
            <p>Нет аккаунта? </p> <a href="?page=regist">Зарегистрируйтесь</a>
        </div>
    </div>
    <!-- login end -->


</body>

</html>