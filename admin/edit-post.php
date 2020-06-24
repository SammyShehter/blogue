<?php
require_once './admin-header.php';

//Getting Post by post ID in $_GET query
$postID = $_GET['id'];
$stmt = $db->prepare('SELECT postID, postTitle, postDesc, postCont FROM blogue_posts WHERE postID = :postID');

$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();
//Getting Post by post ID in $_GET query END


//Post Texts
$postTitle = $_POST['postTitle'];
$postCont = $_POST['postCont'];
$postDesc = $_POST['postDesc'];


//Img Validation functions


if(isset($_POST['submit'])){

    if($postTitle ==''){
        $error[] = 'Please enter the title.';
    }

    if($postDesc ==''){
        $error[] = 'Please enter the description.';
    }

    if($postCont ==''){
        $error[] = 'Please enter the content.';
    }


    //Img validation
    if($_FILES['postImg']['size'] !== 0){

        //Post Img
        $picTmp = $_FILES['postImg']['tmp_name'];
        $picSize = $_FILES['postImg']['size'];
        $picName = $_FILES['postImg']['name'];
        $picType = $_FILES['postImg']['type'];
        $path = '../includes/pictures/';
        $filedir = $path.$picName;      
        $regexPattern = "/.*\.(gif|jpe?g|png)$/i";
        $extensions= array("jpeg","jpg","png");

        if(preg_match($regexPattern,$picName) == false){
            $error[]="Extension is not allowed, please choose a JPEG or PNG file.";
        }
        if($picSize > 2097152) {
            $error[] = 'File size should be less than 2 MB';
        }
        if($picSize < 51200) {
            $error[] = 'File size should be greater than 50 KB';
        }

    }
    

    if(!isset($error)){

        try{

            $stmt = $db->prepare('UPDATE blogue_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID');
            $stmt->execute(array(
                ':postTitle' => $postTitle,
                ':postDesc' => $postDesc,
                ':postCont' => $postCont,
                ':postID' => $postID
            ));

            if($_FILES['postImg']['size'] !== 0){
            $stmt = $db->prepare('UPDATE blogue_posts SET postImg = :postImg WHERE postID = :postID');
            $stmt->execute(array(
                ':postImg' => $picName,
                ':postID' => $postID
            ));

            move_uploaded_file($picTmp, $filedir);

            }
            header('Location: index.php?action=updated');
            exit;

        } catch (PDOException $e){
            echo $e->getMessage;
        }
    }
}

//Check for an errors
if(isset($error)){
    foreach($error as $error){
        echo '<p class="error">'.$error.'</p>';
    }
}

?>

<div class='grid flex-center'>
    <div class='u-18-24'>

        <form action="" method="post" enctype='multipart/form-data'>

            <label for="postTitle">Title</label>
            <input type="text" name="postTitle" value="<?php if(isset($error)){echo $row['postTitle'];}else{echo $row['postTitle'];}?>">
            <br>
            <label for="postDesc">Short Description</label>
            <input type="text" name="postDesc" value="<?php if(isset($error)){echo $row['postDesc'];}else{echo $row['postDesc'];} ?>">
            <br>
            <label>Content</label>
            <textarea name='postCont' rows='30' ><?php if(isset($error)){echo $row['postCont'];}else{echo $row['postCont'];} ?></textarea>

            <input type='file' name='postImg'>
            <br>
            <input type='submit' name='submit' value='Submit'>
        </form>
    </div>
</div>

<?php 
require_once './admin-footer.php';
?>