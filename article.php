<?php


require_once './header/header.php';
//Article ID validation
$articleID = trim($_GET['id'], "\t\n\r\0\x0B"); //Getting ID from $GET
$articleIdQuery = $db->query('SELECT postID FROM blogue_posts'); //Getting all possible ID's

$theCheck = false; //Default check is false
$IdArray = [];

//check prosses
while($row = $articleIdQuery->fetch()){
    array_push($IdArray,  $row['postID']);
}

if(in_array($_GET['id'], $IdArray)){
    $theCheck = true;
}

//If check failed, user gets redirected to main page
if (!$theCheck || $_GET['id'] == '') {
    header('Location: ./');
}
//Article ID validation END

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate, postImg FROM blogue_posts WHERE postID = :postID');

$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();



if ($_GET['id'] == '' && $row['postID'] !== $_GET['id']) {
}



$date = date('l \, \a\t jS \of F Y', strtotime($row['postDate']));

echo "
    <div class='grid flex container'>
        <div class='u-1 u-lg-14-24 post fancyBoxShadow'>
            <div class='postText'>
                <small>Posted on ${date}</small>
                <h2 class='postTitle'>${row['postTitle']}</h2>
                <div class='postImg'>
                    <img class='img-fluid' src='includes/pictures/${row['postImg']}'>
                </div>
                <div class='postContetnt'>${row['postCont']}</div>
            </div>
        </div>
        <div class='u-1 u-lg-8-24 sidebar fancyBoxShadow'>
            <div>
                <h3>We_watch</h3>
                <script type='text/javascript' src='//rf.revolvermaps.com/0/0/8.js?i=53sw0hib5og&amp;m=2&amp;c=ff0000&amp;cr1=ffffff&amp;f=tahoma&amp;l=17&amp;v0=10' async='async'></script>
            </div>
        </div>
    </div>
";

include "./footer/footer.php";

?>