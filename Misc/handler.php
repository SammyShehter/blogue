<?php
require "../includes/config.php";
#$login = $_POST['login'];
#$pass = $_POST['pass'];

/*$count = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
//var_dump($count);
if( mysqli_num_rows($count) == 0 ){
    header("Location: https://a.wattpad.com/cover/177607950-352-k220565.jpg");
    die();
}
else
{
}*/?>
<!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <!-- My CSS -->
      <link rel="stylesheet" href="../style/home.css">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
  
      <title>ADMINKA</title>
    </head>
    <body>
        <div class="wrapper">
            <header>
            </header>
            <div class="container-fluid">
                <div class="block">
                    <div class="row">
                        <div class="col">
                            <form class="form" method="POST" action='handler.php'>
                            <?php 
                                $categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`");
                                $categories = array();
                                while( $cat = mysqli_fetch_assoc($categories_q) )
                                {
                                    $categories[] = $cat;
                                }  

                            if (isset($_POST['do_post'])){
                                $errors = array();

                                if( $_POST['title_insert'] == ''){
                                    $errors[] = 'Please enter the article name';
                                }

                                if( $_POST['arttext'] == ''){
                                    $errors[] = 'Please enter the article text';
                                }

                                if( empty($errors)){
                                    echo '<span style="color:#037bfc; font-weight:bold; font-size:90px;"> Post added successfully!</span><br>
                                         You can watch new post '.'<br><br>';
                                    if($_POST['categorie'] == ''){
                                        mysqli_query($connection, "INSERT INTO `articles` (`title`, `text`, `categorie_id`, `pubdate`, `images`) VALUES ('".$_POST["title_insert"]."', '".$_POST["arttext"]."', '".$cat['id']."', current_timestamp(), NULL)");

                                    }
                                    else{
                                        mysqli_query($connection, "INSERT INTO `articles_categories` (`categorie_title`) VALUES ('".$_POST["categorie"]."')"); 
                                        mysqli_query($connection, "INSERT INTO `articles` (`title`, `text`, `pubdate`, `images`) VALUES ('".$_POST["title_insert"]."', '".$_POST["arttext"]."', current_timestamp(), NULL)");
                                        mysqli_query($connection, "UPDATE `articles` SET categorie_id=(SELECT MAX(id) FROM `articles_categories`) WHERE `id`=(SELECT MAX(id)");
                                    }

                                }
                                else{
                                    echo '<h1>Error occured!</h1>';
                                    echo $errors['0'];
                                }

                            }
                            ?>
                            <h1>Add New Post</h1><br><br>
                                <input type="text" class="col-6" required="" name="title_insert" placeholder="Article name"><br><br>
                                <hr><input type="text" class="col-6" name="categorie" placeholder="Article catigorie"><br><br><h4> Or select already existing category</h4><br>
                                <?php foreach( $categories as $cat )
                                {?>
                                <input type="checkbox" name="checkbox" value="<?php echo $cat['id']; ?>"><?php echo $cat['categorie_title']; ?><br>
                                <?php
                                }?><br><hr><br><br>
                                <textarea name="arttext" required="" class="col-10 textholder" placeholder="Text"></textarea><br><br>

                                <input type="submit" class="btn btn-primary" name="do_post" value="Add Entry to Blogue">
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container-fluid">
                    <div class="block">
                        <div class="row">
                            <div class="col">
                                <h1>Delete Post</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- closing div-->
        </div> 
    </body>
  </html>
  <?php

mysqli_close($connection);
?>
