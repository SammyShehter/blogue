<?php

require_once './header/header.php';
//Article ID validation
$articleID = trim($_GET['id'], "\t\n\r\0\x0B"); //Getting ID from $GET
$articleIdArray = $db->query('SELECT postID FROM blogue_posts'); //Getting all possible ID's

$theCheck = false; //Default check is false

//array of all possible ID's
$IdList = [];
while ($row = $articleIdArray->fetch()) {
    array_push($IdList, $row['postID']);
    
}

//check prosses
foreach ($IdList as $num) {
    if ($_GET['id'] !== '' && $_GET['id'] == $num) {
        $theCheck = true;
        break;
    }
}

//If check failed, user gets redirected to main page
if (!$theCheck) {
    header('Location: ./');
}
//Article ID validation END

$stmt = $db->prepare('SELECT postID, postCat, postTitle, postCont, postDate, postImg FROM blogue_posts WHERE postID = :postID');

$stmt->execute(array('postID' => $_GET['id']));
$row = $stmt->fetch();



if ($_GET['id'] == '' && $row['postID'] !== $_GET['id']) {
}



$date = date('l \, \a\t jS \of F Y', strtotime($row['postDate']));

echo "
    <div class='g flex container'>
        <div class='u-14-24 post'>
            <div class='postText'>
                <small>Posted on ${date}</small>
                <h1 class='postTitle'>${row['postTitle']}</h1>
                <h4 class='postCat'>Categorie: <a href='#'>${row['postCat']}</a></h4>
                <div class='postImg'>
                    <img class='img-fluid' src='includes/pictures/${row['postImg']}'>
                </div>
                <div class='postContetnt'><p>${row['postCont']}</p></div>
            </div>
        </div>
        <div class='u-8-24 kek'>
            <div></div>
        </div>
    </div>
";

include "./footer/footer.php";
