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

                <div class="left row">
                    <a class="logo" href="<?php $links['homepage']; ?>"><img class="img-fluid" src="header/4.png"
                            alt="Logotype Sammy_Shehter_Blogue"></a>
                    <ul class="menu flex-center">
                        <a href="<?php $links['homepage']; ?>"><li class="selected" >Home</li></a>
                        <a href="<?php $links['homepage']; ?>"><li>Home</li></a>
                        <a href="<?php $links['homepage']; ?>"><li>Home</li></a>
                        <a href="<?php $links['homepage']; ?>"><li>Home</li></a>
                        <a href="<?php $links['homepage']; ?>"><li>Home</li></a>
                        <a href="<?php $links['homepage']; ?>"><li>Home</li></a>
                    </ul>
                </div>
                <div class="right row">
                    <div class="socials row">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="search">
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </header>