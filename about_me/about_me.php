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
    <header>
      <?php include "header.php"; ?>   
    </header>
      <div class="group clearfix">
        <div class="container-fluid">
          <div class="inner__article col-lg-8">
            <div class="photoandtext">
              <img class="img-fluid" src="includes/pictures/16.jpg" alt="Logotype Sammy_Shehter_Blogue"><br><br>
              <h3 class="text-wrap"><?php echo $config['title']?></h3><br>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl pretium fusce id velit ut tortor pretium viverra. Ultricies mi eget mauris pharetra et ultrices neque. Convallis tellus id interdum velit laoreet id. In ante metus dictum at tempor. Sed risus ultricies tristique nulla aliquet. Et netus et malesuada fames ac turpis. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Curabitur gravida arcu ac tortor dignissim convallis. Arcu ac tortor dignissim convallis aenean et tortor at risus. Donec pretium vulputate sapien nec sagittis. Integer feugiat scelerisque varius morbi enim nunc faucibus. Sit amet volutpat consequat mauris nunc congue nisi. Molestie a iaculis at erat pellentesque adipiscing commodo elit at. Blandit massa enim nec dui nunc. Porttitor massa id neque aliquam vestibulum morbi blandit cursus. Mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sagittis eu volutpat odio facilisis mauris sit. Placerat duis ultricies lacus sed turpis tincidunt id aliquet.
<br><br>
                 Quis commodo odio aenean sed adipiscing diam donec. Convallis tellus id interdum velit laoreet id donec. Dictumst quisque sagittis purus sit amet volutpat consequat. Augue ut lectus arcu bibendum. Et malesuada fames ac turpis egestas maecenas. Viverra suspendisse potenti nullam ac tortor. Volutpat odio facilisis mauris sit amet massa vitae tortor. Sollicitudin ac orci phasellus egestas tellus rutrum. Risus ultricies tristique nulla aliquet enim tortor. Viverra ipsum nunc aliquet bibendum enim facilisis. Enim neque volutpat ac tincidunt vitae. Amet consectetur adipiscing elit pellentesque habitant morbi. Enim neque volutpat ac tincidunt vitae semper quis lectus. Felis eget nunc lobortis mattis aliquam faucibus. Nisi scelerisque eu ultrices vitae auctor. Dignissim diam quis enim lobortis scelerisque fermentum. Massa massa ultricies mi quis hendrerit. Ornare arcu dui vivamus arcu felis bibendum ut.
<br><br>
                 Consectetur lorem donec massa sapien. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Enim ut tellus elementum sagittis vitae et. Viverra justo nec ultrices dui sapien eget mi. Nec ullamcorper sit amet risus nullam eget. Elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Diam quam nulla porttitor massa id. Morbi leo urna molestie at elementum. Aliquet porttitor lacus luctus accumsan tortor posuere ac ut. Neque egestas congue quisque egestas diam in arcu cursus. Convallis aenean et tortor at. Id faucibus nisl tincidunt eget nullam non nisi est sit. Vulputate mi sit amet mauris commodo quis. Gravida arcu ac tortor dignissim convallis aenean. Leo a diam sollicitudin tempor. A lacus vestibulum sed arcu non.
<br><br>
                 Egestas pretium aenean pharetra magna ac. Accumsan tortor posuere ac ut consequat semper viverra. Semper auctor neque vitae tempus quam pellentesque nec. Sed adipiscing diam donec adipiscing tristique risus. Morbi quis commodo odio aenean sed adipiscing diam donec adipiscing. Tincidunt vitae semper quis lectus nulla at. Est ante in nibh mauris cursus. Accumsan lacus vel facilisis volutpat est velit egestas dui id. Augue eget arcu dictum varius duis at consectetur lorem. Turpis egestas pretium aenean pharetra magna ac placerat vestibulum lectus. Magna fringilla urna porttitor rhoncus dolor purus non enim praesent. Consectetur libero id faucibus nisl tincidunt eget. Vehicula ipsum a arcu cursus vitae congue. Quis imperdiet massa tincidunt nunc. Auctor neque vitae tempus quam. Libero id faucibus nisl tincidunt. Gravida in fermentum et sollicitudin ac orci phasellus egestas tellus. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt.
<br><br>
                 Adipiscing at in tellus integer feugiat scelerisque varius. Sem integer vitae justo eget magna fermentum iaculis eu non. Aliquet bibendum enim facilisis gravida neque. Nunc sed id semper risus in hendrerit gravida rutrum quisque. Eu consequat ac felis donec et odio pellentesque diam. Congue nisi vitae suscipit tellus mauris a diam maecenas. Rhoncus urna neque viverra justo nec ultrices dui sapien. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Quis varius quam quisque id diam vel quam. Est velit egestas dui id ornare arcu odio ut. Et netus et malesuada fames ac turpis egestas maecenas. Tincidunt augue interdum velit euismod. Mi ipsum faucibus vitae aliquet nec ullamcorper. Libero nunc consequat interdum varius sit. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus. Nisl pretium fusce id velit ut tortor. Pulvinar mattis nunc sed blandit.</p>
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