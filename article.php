<?php
  require "includes/config.php";
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="style/articlecss.css">


    <title><?php echo $config['title']?></title>
  </head>
  <body>
    <div class="wrapper">
      <?php
      #var_dump($_GET['id']); die;
        $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
        if( mysqli_num_rows($article) <= 0):?>
        <header>
        <?php include "header.php"; ?> 
        </header>
          <div class="group clearfix">
          <div class="container-fluid">
            <div class="row">
              <div class='col-lg-8'>
                <div class="inner__article col-lg-12">
                    <h3 class="col">ERROR!</h3>
                    <img class="img-fluid" src="includes/pictures/<?php echo rand(4041,4042);?>.png" alt="Logotype 404"><br><br>
                    <h3 class="text-wrap">Error 404</h3><br>
                    <p>Not found</p>
                </div>
            </div> <!--col-8-->
            <div class="sidebar col-lg-4">
              <?php include "includes/sidebar.php";?>
            </div>
          </div> <!-- row -->   
        </div> <!-- container-fluid-->
      </div>  <!-- group clearfix-->
      <?php include 'includes/footer.php'; ?>
    </div> <!-- wrapper div --> 
  </body>
</html>
<?php
else:
$art = mysqli_fetch_assoc($article);
mysqli_query($connection, "UPDATE `articles` SET `views` = `views` +1 WHERE `id` = " . (int) $art['id']);?>
  <header>
  <?php include "header.php"; ?> 
  </header>
  <div class="group clearfix">
    <div class="container-fluid">
      <div class="row">
        <div class='col-lg-8'>
          <div class="inner__article col-lg-12">
            <div class="row">
            <h3 class='col'><?= $art['title']; ?></h3>
            <h6 class="col my-auto text-right"><?= $art['views'];?> views</h6>
            </div>


              <img class="img-fluid" src="includes/pictures/<?= $art['images'];?>" alt="Logotype Sammy_Shehter_Blogue"><br><br>
              <h3 class="text-wrap"><?= $art['title'];?></h3><br>
              <p><?= $art['text'];?></p><hr>
          </div>
        </div> <!--col-8-->
        <div class="sidebar col-lg-4">
          <?php include "includes/sidebar.php";?>
        </div>
      </div> <!-- row -->   
    </div> <!-- container-fluid-->
  </div>  <!-- group clearfix-->
  <?php include 'includes/footer.php'; ?>
</div> <!-- wrapper div --> 
</body>
</html>
<?php endif;  
?>
