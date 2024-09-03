<?
require './components/connection.php';

global $connection;

session_start();

if (isset($_SESSION['uid'])) {

    $id = $_SESSION['uid'];

    $user = $connection->query("SELECT *FROM users WHERE id=$id")->fetch((PDO::FETCH_ASSOC));
}

if (isset($_GET['exit'])) {

    session_unset();

    header('Location: ?page=login');
}


?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUDE</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <?php
  if($_GET['page']!='admin' && $_GET['page']!='admin_tovar' && $_GET['page']!='delete' && $_GET['page']!='edit'  && $_GET['page']!='addition') {
    require('pages/header.php');
  }
  if (isset($_GET['page'])){
     $page = $_GET['page'];

    if ($_GET['page'] == 'main'){
        require 'pages/main.php';
    }
    if ($_GET['page'] == 'about'){
        require 'pages/about.php';
    }
    if ($_GET['page'] == 'addition'){
        require 'pages/addition.php';
    }
    if ($_GET['page'] == 'admin_tovar'){
        require 'pages/admin_tovar.php';
    }
    if ($_GET['page'] == 'admin'){
        require 'pages/admin.php';
    }
    if ($_GET['page'] == 'katalog'){
        require 'pages/katalog.php';
    }
    if ($_GET['page'] == 'edit'){
        require 'pages/edit.php';
    }
    if ($_GET['page'] == 'edit_user'){
        require 'pages/edit_user.php';
    }
    if ($_GET['page'] == 'delete'){
        require 'pages/delete.php';
    }
    if ($_GET['page'] == 'korzina'){
        require 'pages/korzina.php';
    }
    if ($_GET['page'] == 'login'){
        require 'pages/login.php';
    }
    if ($_GET['page'] == 'regist'){
        require 'pages/regist.php';
    }
    if ($_GET['page'] == 'polzavatel'){
        require 'pages/polzavatel.php';
    }
    if ($_GET['page'] == 'ban'){
        require 'pages/ban.php';
    }
    if ($_GET['page'] == 'kartochka'){
        require 'pages/kartochka.php';
    }
  } else {
       require 'pages/main.php';
  }
  if($_GET['page']!='admin'&& $_GET['page']!='admin_tovar' && $_GET['page']!='edit'  && $_GET['page']!='delete' && $_GET['page']!='addition'  ) {
    include('pages/footer.php');
  }
  ?>

    

</body>

</html>