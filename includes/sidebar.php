<div class="inner__sidebar">
    <div class="sidebar__block d-none d-lg-block">
    <div class="block">
    <h4>We_watch</h4>
        <script type="text/javascript" src="//rf.revolvermaps.com/0/0/8.js?i=53sw0hib5og&amp;m=2&amp;c=ff0000&amp;cr1=ffffff&amp;f=tahoma&amp;l=17&amp;v0=10" async="async"></script>
    </div>
    </div>
    <div class="sidebar__block">
    <div class="block">
              <div class="row">
                <div class="col">
                  <h4 class="newest">Top-5 Hotest topics</h4>
                </div>
              </div>
              <div class="row">
                  <?php 
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5 ");

                    while ( $art = mysqli_fetch_assoc($articles) ){
                  ?>
                <div class="col-sm-12">
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
    </div>
    <div class="sidebar__block d-none">

    </div>
</div>