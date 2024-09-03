<?php 
 
$error = ""; 
$error_email = ""; 
$error_name = ""; 
$error_surname = ""; 
$error_img = ""; 


 
 
if (isset($_GET['edit_id'])) { 
 
    $id = $_GET['edit_id']; 
 
    $user = $connection->query("SELECT * FROM users WHERE id=$id")->fetch(PDO::FETCH_ASSOC); 
} 
 
if (isset($_POST['edit_user'])) { 
    $name = $_POST["name"]; 
    $surname = $_POST["surname"]; 
    $email = $_POST["email"]; 
 
    if (preg_match("/^.*([0-9])+.*$/", $name)) { 
 
        $error_name .= '<div class="error_name">Можно вводить только буквы!</div>'; 
 
    } 
    if (empty(($name))) { 
 
        $error_name .= '<div class="error_name">Введите Имя!</div>'; 
 
    } else if (strlen($name) < 2) { 
 
        $error_name .= '<div class="error_name">Имя не должно быть меньше 2 символов!</div>'; 
    } 
    if (empty($surname)) { 
 
        $error_surname .= '<div class="error_surname">Введите фамилию!</div>'; 
    } 
    if (preg_match("/^.*([0-9])+.*$/", $surname)) { 
 
        $error_surname .= '<div class="error_surname">Можно вводить только буквы!</div>'; 
 
    } 
    if (empty($email)) { 
 
        $error_email .= '<div class="error_email">Введите Email!</div>'; 
 
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
 
        $error_email .= '<div class="error_email">Неверный формат Email!</div>'; 
    } 
 
    if (is_bool($_FILES['file']) != true) { 
        $route = $user['img']; 
        $connection->query("UPDATE users SET `img`='$route',`name`='$name',`surname`='$surname', `email`='$email' WHERE id={$_GET['edit_id']}"); 
 
 
    } else { 
        if ($_FILES['file']['size'] > 50 * 1024 * 1024) { 
            $error_img .= '<div class="error_img">Слишком большой размер файла</div>'; 
        } 
 
        // if ($_FILES['file']['type'] != 'image/jpeg' && $_FILES['file']['type'] != 'image/png' && $_FILES['file']['type'] != 'image/webp') { 
        //     $error_img .= '<div class="error_img">Неправильный формат файла</div>'; 
        // } 
    } 
 
    $route = './assets/img/' . time() . $_FILES['file']['name']; 
 
    if ($error == '') { 
 
        if (move_uploaded_file($_FILES['file']['tmp_name'], $route)) { 
            var_dump($route); 
            $connection->query("UPDATE users SET `img`='$route',`name`='$name',`surname`='$surname', `email`='$email' WHERE id={$_GET['edit_id']}"); 
 
        } else { 
            // $error .= '<div class="error">Ошибка загрузки изображения</div>'; 
        } 
    } 
    header('location: ?page=polzavatel'); 
} 
 
?> 
<!DOCTYPE html> 
<html lang="ru"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Редактировать данные</title> 
    <link rel="stylesheet" href="assets/css/style.css"> 
</head> 
 
<body> 
 
    <!-- edit_user start --> 
    <div class="regist">
                <div class="regist-block content">
            <h2>Редактировать <br> данные</h2> 
            <div class="regist-form"> 
            <form method="post" class="form_dobav" name="edit_user" enctype="multipart/form-data"> 
                    <input class="form" type="text" name="name" placeholder="Имя" value="<?= $user['name'] ?>"> 
                    <?= $error_name ?> 
                    <input class="form" type="text" name="surname" placeholder="Фамилия" 
                        value="<?= $user['surname'] ?>"> 
                    <?= $error_surname ?> 
                    <input class="form" type="text" name="email" placeholder="Email" value="<?= $user['email'] ?>"> 
                    <?= $error_email ?> 
                    <input class="form" type="file" name="file" placeholder="Фото пользователя"> 
                    <?= $error_img ?> 
                    <?= $error ?> 
                    <input class="btn_edit_user" name="edit_user" type="submit" value="Редактировать"> 
                </form> 
            </div> 
 
        </div> 
 
    </div> 
    <!-- edit_user end --> 
 
</body> 
 
</html>