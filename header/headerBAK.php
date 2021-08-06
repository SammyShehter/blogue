<?php
  require "includes/config.php";
?>

<div class="inner__header">
    <div class="inner__inner__header">
    <div class='container-fluid'>
        <div class="row">
            <div class="col-sm logotypepic d-lg-block">
            <a href='index.php'><img class="img-fluid" ='index.php' src="includes/pictures/4.png" alt="Logotype Sammy_Shehter_Blogue"></a>
            </div>
            <div class="col-sm title text-center text-nowrap">
                <h1 class='mx-auto'>Sammy Shehter Blogue</h1>
            </div>
            <nav class="header__top__menu col-sm text-right text-nowrap">
            <ul>
                <li><a href="<?php echo $config['links']['homepage']?>">Home</a></li>
                <li><a href="<?php echo $config['links']['about_me']?>">About me</a></li>
                <li><a href="<?php echo $config['links']['facebook']?>" target="_blank">Facebook</a></li>
            </ul>
            </nav>
        </div>
        </div>
    </div>
    <?php 
        $categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`");
        $categories = array();
        while( $cat = mysqli_fetch_assoc($categories_q) )
        {
            $categories[] = $cat;
        }                                                         
    ?>
    <div class="header__bottom d-none d-lg-block">
        <div class="container-fluid">
            <nav>
                <ul>
                    <?php
                    foreach( $categories as $cat )
                    {
                    ?>
                        <li><a href="articles.php?page=1&categorie=<?php echo $cat['id']; ?>"><?php echo $cat['categorie_title']; ?></a></li>
                        <?php
                    }
                        ?>
                 </ul>
        </nav>
    </div>
</div>
</div>