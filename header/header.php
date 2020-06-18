<?php
require "includes/config.php";
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo $config['title'] ?></title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="main row">
                <a class="logo" href="<?php $links['homepage']; ?>"><img class="img-fluid" src="header/4.png"
                        alt="Logotype Sammy_Shehter_Blogue"></a>
                    
                <ul class="menu flex-center max-height">
                    <!-- DROPDOWN STRUCTURE -->                        
                    <div class="dropdown max-height">
                        <li><a class="flex-center menu-active" href="<?php $links['homepage']; ?>">Home</a></li>
                        <div class="dropdown-menu">
                            <a href="#">KEK</a>
                            <a href="#">KEK</a>
                            <a href="#">KEK</a>                            
                        </div>
                    </div>
                    <!-- DROPDOWN STRUCTURE END -->

                    <li><a class="flex-center" href="<?php $links['homepage']; ?>">Home</a></li>
                    <li><a class="flex-center" href="<?php $links['homepage']; ?>">Home</a></li>
                    <li><a class="flex-center" href="<?php $links['homepage']; ?>">Home</a></li>
                    <li><a class="flex-center" href="<?php $links['homepage']; ?>">Home</a></li>
                    <li><a class="flex-center" href="<?php $links['homepage']; ?>">Home</a></li>
                </ul>

                <div class="search flex-center">
                    <a href="#"><i class="fa fa-search"></i></a>
                </div>
            </div>
        </div>
        <script src="./header/header.js"></script>
    </header>