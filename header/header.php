<?php include "./includes/config.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title><?php echo $config['title'] ?></title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="main row fancyBoxShadow">
                <a class="logo" href="<?php echo $config['links']['homepage']; ?>"><img class="img-fluid" src="header/4.png"
                        alt="Logotype Sammy_Shehter_Blogue"></a>

                <a class="mobile-menu-call flex-center" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>    
                
                <nav class="menu flex-center max-height">
                    
                    <!-- DROPDOWN STRUCTURE -->
                    <li class="dropdown">
                        <ul class="max-height">
                            <li><a class="flex-center menu-active" href="#">Projects &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu" aria-label="submenu">
                                    <li><a href="./projects/formValidator/">Form Validator</a></li>
                                    <li><a href="./projects/kav-la-oved-calc/calculator.html">Kav La Oved Calculator</a></li>
                                    <li><a href="./projects/Translit/">Translit</a></li>
                                    <li><a href="./projects/reactApp">Twitter-Analogue</a></li>
                                    <li><a href="./projects/aviasalesAPI">Aviasales</a></li>
                                    <li><a href="./projects/movieSeats">Movie Seats</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- DROPDOWN STRUCTURE END -->
                    <li><a class="flex-center" href="./admin">Admin</a></li>
                    <li><a class="flex-center" href="<?php echo $config['links']['homepage']; ?>">Home</a></li>
                </nav>

                <div class="search flex-center">
                    <input type="text" id="fname" name="fname">
                    <a href="#"><i class="fa fa-search"></i></a>
                </div>
            </div>
        </div>
        <script src="./header/header.js"></script>
    </header>