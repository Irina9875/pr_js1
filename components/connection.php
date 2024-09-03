<?

try {
    $dsn = 'mysql:host=localhost;dbname=kur';
    $connection= new PDO ($dsn, 'root', '');
    // $connection= new PDO ($dsn, 'z952', 'fsC5fLHdBtEKrYjW');
} 
catch (PDOException $exception) {
    echo $exception->getMessage();
}

?>
