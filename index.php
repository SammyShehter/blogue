<?php
require_once "./header/header.php";
// include "./fourBoxes/fourBoxes.php"; 

echo "<div class='grid postMain'>";
    try{
        $stmt = $db->query('SELECT postID, postTitle, postDesc, postDate, postImg FROM blogue_posts ORDER BY postID DESC');
        while($row = $stmt->fetch()){
            $date = date('l \, \a\t jS \of F Y', strtotime($row['postDate']));
            echo "
                    <div class='u-1 u-lg-5-12 postDemo'>
                        <div class='postText'>
                            <small>Posted on ${date}</small>
                            <h1 class='postTitle'><a href='./article.php?id=${row['postID']}'>${row['postTitle']}</a></h1>
                            <div class='postDesc'><p>${row['postDesc']}...</p><a class='readMore flex' href='./article.php?id=${row['postID']}'>Read More</a></div>
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
echo "</div>";


include "./footer/footer.php"; 

?>
