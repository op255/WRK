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

    $dsn = "mysql:host=localhost;charset=utf8;port=3036";
    $pdo = new \PDO($dsn, 'root', 'root', $options);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `PostDB`;
                CREATE USER 'root'@'localhost' IDENTIFIED BY 'root';
                GRANT ALL ON `PostDB`.* TO 'root'@'localhost';
                FLUSH PRIVILEGES;");
    $pdo->exec("use PostDB");

    $colums = "id INT AUTO_INCREMENT PRIMARY KEY, 
                text_content TEXT NOT NULL, 
                img_src VARCHAR( 256 ),
                reply_to INT,
                parent INT" ;

    $pdo->exec("CREATE TABLE IF NOT EXISTS PostDB.posts ($colums)");

    $sqlInsert = "INSERT INTO posts (text_content) VALUES (?)";

    for ($i = 0; $i < 34; ++$i) {
        $stmt= $pdo->prepare($sqlInsert);
        $stmt->execute([$lipsum->paragraph()]);
    }
?>