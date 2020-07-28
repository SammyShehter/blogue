<?php

include "./config.php";

if(isset($_POST['request'])){

    is_numeric($_POST['request']) ? $request = $_POST['request'] : exit;
    // $request = $_POST['request'];

    try{
        $stmt = $db->prepare('SELECT postID, postTitle, postDesc, postDate, postImg FROM blogue_posts ORDER BY postID DESC LIMIT 4 OFFSET :offset');
        $stmt->execute(array(
            ':offset' => $request
        ));
        while($row = $stmt->fetch()){
            $date = date('l \, \a\t jS \of F Y', strtotime($row['postDate']));
            echo "
                    <div class='u-1 u-lg-5-12 postDemo fancyBoxShadow'>
                        <div class='postText'>
                            <small>Posted on ${date}</small>
                            <h1 class='postTitle'><a href='./article.php?id=${row['postID']}'>${row['postTitle']}</a></h1>
                            <div class='postDesc'>${row['postDesc']}...<a class='readMore flex' href='./article.php?id=${row['postID']}'>Read More</a></div>
                        </div>
                        <div class='postImg'>
                            <a href='./article.php?id=${row['postID']}'>
                                <img class='img-fluid' src='includes/pictures/${row['postImg']}'>
                            </a>
                        </div>
                    </div>
            ";
        }
    } catch(PDOException $e){
        echo "<p class='error'>".$e->getMessage()."</p>";
    }
} else {
    return false;
}


?>
