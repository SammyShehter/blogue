<?php
require_once '../includes/config.php';

//if not logged in redirecting to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>


<table>
<tr>
    <th>Title</th>
    <th>Date</th>
    <th>Action</th>
</tr>

<?php
    $stmt = $db->query('SELECT postID, postCat, postDesc, postTitle, postDate FROM blogue_posts');
    while($row = $stmt->fetch()){
        $postDate = date('jS M Y', strtotime($row['postDate']));
        echo "
                <tr>
                    <td>${row['postTitle']}</td>
                    <td>${postDate}</td>
                    <td>
                    <a href='edit-post.php?id${row['postID']}'>Edit Post</a>
                    <a href='javascript:delpost('${row['postID']}',${row['postTitle']})'>Delete Post</a>
                    </td>
                </tr>
             ";
    }
?>
</table>


<!-- Logout -->
<form action="" method="post">

    <button name="logout">Logout</button>

</form>

<?php
    if(isset($_POST['logout'])){
        $user->logout();
        header('Location: login.php');
    }
?>
<!-- Logout END-->