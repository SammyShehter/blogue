<?php
  require "includes/config.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- My CSS -->
    <link rel="stylesheet" href="style/home.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title><?php echo $config['title']?></title>
  </head>
  <body>
    <div class="wrapper">
      <header>
        <?php include "header.php"; ?>
        <?php
          $num_rows = 6;
          $page = 1;
          if(isset($_GET['page'])){
            $page = (int) $_GET['page'];
          }
          if(isset($_GET['categorie'])){
            $categorie = (int) $_GET['categorie'];
          }
          
          $offset = ($num_rows * $page) - $num_rows;

          if(isset ($_GET['categorie'])){
            $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = $categorie ORDER BY `id` DESC LIMIT $offset,$num_rows");
            $total_count_q = mysqli_query( $connection, "SELECT COUNT(`id`) AS `total_count` FROM `articles` WHERE `categorie_id` = $categorie");
            $total_count = mysqli_fetch_assoc($total_count_q);
            $total_count = $total_count['total_count'];
            //$test = parse_url($_GET['categorie']);
            $art_cat = false;
            foreach( $categories as $cat ){
              if( $cat['id'] == $categorie ){
                $art_cat = $cat;
              break;
              }
            } 
          }

          else{
            $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $offset,$num_rows");
            $total_count_q = mysqli_query( $connection, "SELECT COUNT(`id`) AS `total_count` FROM `articles`");
            $total_count = mysqli_fetch_assoc($total_count_q);
            $total_count = $total_count['total_count'];
          }
          


          $num_pages = ceil($total_count / $num_rows);
          if($page <= 1 || $page > $num_pages){
            $page = 1;
          }
          $article_exist = true;

        ?>
      </header>
      <div class="group clearfix">
        <div class="container-fluid">
          <div class="inner__article col-lg-8">


            <div class="block">
              <div class="row">
                <div class="col">
                  <h4 class="newest"><?php if(isset($_GET['categorie'])){
                    echo "All articles of the category ".$art_cat['categorie_title'];
                    }else{
                      if(mysqli_num_rows($articles) <= 0){
                        echo 'No articles found';
                        $article_exist = false;
                      }
                      else{
                        echo "All articles";
                      }
                      
                    }
                    ?></h4>
                </div>
              </div>
              <div class="row">
                  <?php

                    while($art = mysqli_fetch_assoc($articles)){
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
                  if(mysqli_num_rows($articles) > 0){
                    echo '<div class="paginator col-12">';
                    if ($page > 1){
                      if(isset ($_GET['categorie'])){
                      echo '<a href="articles.php?page='.($page - 1).'&categorie='.$categorie.'">&laquo; Previous Page</a>';
                    }
                      else{
                        echo '<a href="articles.php?page='.($page - 1).'">&laquo; Previous Page</a>';
                      }
                    }
                    if( $page < $num_pages){
                      if(isset ($_GET['categorie'])){
                        echo '<a class="float-right" href="articles.php?page='.($page + 1).'&categorie='.$categorie.'">Next Page &raquo;</a>';
                      }

                      else{echo '<a class="float-right" href="articles.php?page='.($page + 1).'">Next Page &raquo;</a>';
                      }
                    }
                    echo '</div>';
                  }
                  ?>
              </div>
            </div>
          </div>
          <div class="sidebar col-lg-4">
            <?php include "includes/sidebar.php";?>
          </div>
        </div>
      </div>


    <?php include 'includes/footer.php'; ?>
    </div>  
  </body>
</html>