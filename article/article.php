<?php

include '../includes/config.php';
include '../header/header.php';

$stmt = $db->prepare('SELECT postID, postCat, postTitle, postCont, postDate, postImg FROM blogue_posts WHERE postID = :postID');
$stmt->execute(array('postID' => $_GET['id']));
$row = $stmt->fetch();

// if($row['postId'] == ''){
//     header('Location: ../');
// }

$date = date('l \, \a\t jS \of F Y', strtotime($row['postDate']));

echo "
    <div class='g'>
        <div class='u-1 post'>
            <div class='postText'>
                <small>Posted on ${date}</small>
                <h1 class='postTitle'><a href='article/article.php?id=${row['postID']}'>${row['postTitle']}</a></h1>
                <h4 class='postCat'>Categorie: <a href='#'>${row['postCat']}</a></h4>
                <p class='postDesc'>${row['postDesc']}...<a class='readMore flex' href='article/article.php?id=${row['postID']}'>Read More</a></p>
            </div>
            <div class='postImg'>
                <a href='article/article.php?id=${row['postID']}'>
                    <img class='img-fluid' src='includes/pictures/${row['postImg']}'>
                </a>
            </div>
        </div>
    </div>
";


?>