<?php
$config = array(
    'title' => 'Sammy_Shehter_Blogue',
    'links' => array(
        'homepage' => '/bloguev2/index.php',
        'about_me' => 'about_me.php',
        'facebook' => 'https://www.facebook.com/SamirSchechter',

    ),
    
    'db' => array(
        'server' => '127.0.0.1',
        'username' => 'sammyshehter',
        'password' => '123',
        'name' => 'blogue'
    )
);

$connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name']
);
 
?>
