<?php
  require "includes/config.php";
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/style.css">

    <title><?php echo $config['title']?></title>
  </head>
  <body>
    <div class="wrapper">
      <header>
        <?php include "header.php"; ?>
      </header>
      <div class="group clearfix">
        <div class="container-fluid">
          <div class="inner__article col-lg-8">


            <div class="block">
              <div class="row">
                <div class="col">
                  <h4 class="newest">Latest News</h4>
                </div>
                <div class="col text-right">
                  <a class="articles__link" href="articles.php?page=1">All articles</a>
                </div>
              </div>
              <div class="row">
                  <?php 
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 6 ");

                    while ( $art = mysqli_fetch_assoc($articles) ){
                  ?>
                <div class="col-sm-6">
                  <article class='block1'>
                    <img class="picture1" src="includes/pictures/<?php echo $art['images']; ?>">
                      <div class='block1__1'>
                        <h5><a href='article.php?id=<?php echo $art['id'];?>'><?php echo $art['title'];?></a></h5>
                        <?php 
                        $art_cat = false;
                        foreach( $categories as $cat ){
                          if( $cat['id'] == $art['categorie_id'] ){
                            $art_cat = $cat;
                          break;
                          }
                        } 
                        ?>
                        <h6>category: <a href='articles.php?page=1&categorie=<?php echo $art_cat['id']; ?>'><?php echo $art_cat['categorie_title']; ?></a></h6>
                        <p class="text"><?php echo mb_substr( strip_tags($art['text']) , 0, 80, 'utf-8');?>... <a href='article.php?id=<?php echo $art['id'];?>'>Continue Reading</a></p>
                      </div>
                  </article>
                </div>
                  <?php
                  }
                  ?>
              </div>
            </div>


            <div class="block">
              <div class="row">
                <div class="col">
                  <h4 class="newest">First Category</h4>
                </div>
                <div class="col text-right">
                  <a class="articles__link" href="articles.php?page=1&categorie=1">All articles</a>
                </div>
              </div>
              <div class="row">
                  <?php 
                    $articles_1 = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 1 ORDER BY `id` DESC LIMIT 6 ");

                    while ( $art = mysqli_fetch_assoc($articles_1) ){
                  ?>
                <div class="col-sm-6">
                  <article class='block1'>
                    <img class="picture1" src="includes/pictures/<?php echo $art['images']; ?>">
                      <div class='block1__1'>
                        <h5><a href='article.php?id=<?php echo $art['id'];?>'><?php echo $art['title'];?></a></h5>
                        <?php 
                        $art_cat = false;
                        foreach( $categories as $cat ){
                          if( $cat['id'] == $art['categorie_id'] ){
                            $art_cat = $cat;
                          }
                        } 
                        ?>
                        <h6>category: <a href='articles.php?page=1&categorie=<?php echo $art_cat['id']; ?>'><?php echo $art_cat['categorie_title']; ?></a></h6>
                        <p class="text"><?php echo mb_substr( strip_tags($art['text']) , 0, 80, 'utf-8');?>... <a href='article.php?id=<?php echo $art['id'];?>'>Continue Reading</a></p>
                      </div>
                  </article>
                </div>
                  <?php
                  }
                  ?>
              </div>
            </div>

            <div class="block">
              <div class="row">
                <div class="col">
                  <h4 class="newest">Second Topic News</h4>
                </div>
                <div class="col text-right">
                  <a class="articles__link" href="articles.php?page=1&categorie=2">All articles</a>
                </div>
              </div>
              <div class="row">
                  <?php 
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 2  ORDER BY `id` DESC LIMIT 6 ");

                    while ( $art = mysqli_fetch_assoc($articles) ){
                  ?>
                <div class="col-sm-6">
                  <article class='block1'>
                    <img class="picture1" src="includes/pictures/<?php echo $art['images']; ?>">
                      <div class='block1__1'>
                        <h5><a href='article.php?id=<?php echo $art['id'];?>'><?php echo $art['title'];?></a></h5>
                        <?php 
                        $art_cat = false;
                        foreach( $categories as $cat ){
                          if( $cat['id'] == $art['categorie_id'] ){
                            $art_cat = $cat;
                          break;
                          }
                        } 
                        ?>
                        <h6>category: <a href='articles.php?page=1&categorie=<?php echo $art_cat['id']; ?>'><?php echo $art_cat['categorie_title']; ?></a></h6>
                        <p class="text"><?php echo mb_substr( strip_tags($art['text']) , 0, 80, 'utf-8');?>... <a href='article.php?id=<?php echo $art['id'];?>'>Continue Reading</a></p>
                      </div>
                  </article>
                </div>
                  <?php
                  }
                  ?>
              </div>
            </div>


          </div> <!--sm-8 closing div-->

          <div class="sidebar col-lg-4">
            <?php include "includes/sidebar.php";?>
          </div>
        </div>
      </div>


    <?php include 'includes/footer.php'; ?>
    </div>  
  </body>
</html>