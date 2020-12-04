<?php

    spl_autoload_register(function ($class) {

        $prefix = 'App\\';
    
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            return;
        }
    
        $relative_class = substr($class, $len);
    
        $file = str_replace('\\', '/', $relative_class) . '.php';
    
        if (file_exists($file)) {
            require_once $file;
        }
    });

    use App\Dev\LoremIpsum;

    $lipsum = new LoremIpsum();


    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $dsn = "mysql:host=localhost;dbname=PostDB;charset=utf8;port=3036";
    $pdo = new \PDO($dsn, 'root', 'root', $options);
    $sql = "INSERT INTO posts (text_content) VALUES (?)";

    for ($i = 0; $i < 14; ++$i) {
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$lipsum->paragraph()]);
    }
?>