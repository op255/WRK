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

    $postsColumns = "id INT AUTO_INCREMENT PRIMARY KEY, 
                text_content TEXT NOT NULL, 
                img_src VARCHAR( 512 ),
                reply_to INT,
                parent INT" ;

    $usersColumns = "id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR( 128 ) NOT NULL,
                    email VARCHAR( 128 ) NOT NULL,
                    password VARCHAR( 128 ) NOT NULL";

    $pdo->exec("CREATE TABLE IF NOT EXISTS PostDB.posts ($postsColumns)");
    $pdo->exec("CREATE TABLE IF NOT EXISTS PostDB.users ($usersColumns)");

    $sqlP = "INSERT INTO posts (text_content) VALUES (?)";
    $sqlPI = "INSERT INTO posts (text_content, img_src) VALUES (?, ?)";
    $sqlC = "INSERT INTO posts (text_content, reply_to, parent) VALUES (?, ?, ?)";
    $sqlCI = "INSERT INTO posts (text_content, img_src, reply_to, parent) VALUES (?, ?, ?, ?)";

    $countPosts = isset($argv[1]) ? $argv[1] : 34;
    $countComments = isset($argv[2]) ? $argv[2] : $countPosts*2;

    $images = array(    'https://upload.wikimedia.org/wikipedia/commons/1/13/Kauffman_bracket2.png',
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Greater_coat_of_arms_of_the_United_States.svg/1024px-Greater_coat_of_arms_of_the_United_States.svg.png',
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Great_Seal_of_the_United_States_%28reverse%29.svg/1024px-Great_Seal_of_the_United_States_%28reverse%29.svg.png',
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Texas_medical_center.jpg/1920px-Texas_medical_center.jpg',
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/RamTypes.JPG/1920px-RamTypes.JPG',
                        'https://upload.wikimedia.org/wikipedia/commons/0/05/Cabin_dubbing.jpg',
                        'https://upload.wikimedia.org/wikipedia/commons/b/bb/Plusoultre.jpg',
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/Coat_of_Arms_of_Spain.svg/1024px-Coat_of_Arms_of_Spain.svg.png',
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Indonesia_relief_location_map.jpg/235px-Indonesia_relief_location_map.jpg',
                        'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Order_of_Liberation_2nd_Class.svg/1920px-Order_of_Liberation_2nd_Class.svg.png',
                        'https://upload.wikimedia.org/wikipedia/commons/9/92/Eophrynus_prestvicii_BU669.jpg');

    $N = sizeof($images);


    // Posts
    for ($i = 0; $i < $countPosts; ++$i) {
        if (rand(0,2) == 0) {
            $stmt= $pdo->prepare($sqlPI);
            $stmt->execute([$lipsum->paragraph(), $images[rand(0,$N-1)]]);
        }
        else {
            $stmt= $pdo->prepare($sqlP);
            $stmt->execute([$lipsum->paragraph()]);
        }
    }


    // Comments
    for ($i = 0; $i < $countComments; ++$i) {
        $r = rand(1, $countPosts);
        
        if (rand(0,2) == 0) {
            $stmt= $pdo->prepare($sqlCI);
            $stmt->execute([$lipsum->paragraph(), $images[rand(0,$N-1)], $r, $r]);
        } 
        else {
            $stmt= $pdo->prepare($sqlC);
            $stmt->execute([$lipsum->paragraph(), $r, $r]);
        }
    }
?>