<?php

require_once './admin-header.php';

//if not logged in redirecting to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit; }


?>


<?php
    if(isset($_GET['delpost'])){
        $stmt = $db->prepare('DELETE FROM blogue_posts WHERE postID = :postID');
        $stmt->execute(array(':postID' => $_GET['delpost']));

        header('Location: index.php?action=deleted');
    }

    if(isset($_GET['action'])){
        echo "<h2 class='postAction'>Post ${_GET['action']}</h2>";
    }
?>

<div class="grid flex-center adminMain">
    <table class="u-1 u-md-18-24 mainTable flex-center fancyBoxShadow">
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Decsription</th>
            <th>Action</th>
        </tr>
        
        <?php
        try{
            $stmt = $db->query('SELECT postID, postDesc, postTitle, postDate FROM blogue_posts');
            while($row = $stmt->fetch()){
                $postDate = date('jS M Y', strtotime($row['postDate']));
                $postDesc = substr($row['postDesc'], 0,50);
                // $postDesc = $row['postDesc'];
                echo "
                        <tr>
                            <td>${row['postTitle']}</td>
                            <td>${postDate}</td>
                            <td>${postDesc}</td>
                            <td>
                            <button><a href='edit-post.php?id=${row['postID']}'>Edit Post</a></button>
                            <button><a href='javascript:delpost(${row['postID']},`${row['postTitle']}`)'>Delete Post</a></button>
                            </td>
                        </tr>
                        
                ";
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
            
        ?>
    </table>
</div>


<!-- DELETE POST FUNCTION -->

<script>

function delpost(id,title){
    if(confirm(`Are you sure you want to delele ${title}`)){
        window.location.href = `index.php?delpost=${id}`;
    }
}

</script>


<!-- DELETE POST FUNCTION END -->




<!-- Logout -->
<?php
    if(isset($_POST['logout'])){
        $user->logout();
        header('Location: login.php');
    }
?>

<form action="" method="post" class="logout flex-center">
    <button name="logout">Logout</button>
</form>



<!-- Logout END-->    


<?php 
require_once './admin-footer.php';
?>