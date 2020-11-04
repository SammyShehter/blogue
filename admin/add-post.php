<?php
require_once './admin-header.php';


//Post Texts
$postTitle = $_POST['postTitle'];
$postCont = $_POST['postCont'];
$postDesc = $_POST['postDesc'];

//Submit Handeler
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

    //CHECK if there was an image input
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
    //CHECK if there was an image input END


    if(!isset($error)){

        try{

            $stmt = $db->prepare('INSERT INTO blogue_posts (postTitle, postImg, postDesc, postCont) VALUES (:postTitle, :postImg, :postDesc, :postCont)');

            

            $queryArr = array(
                    ':postTitle' => $postTitle,
                    ':postImg' => 'default.jpg',
                    ':postDesc' => $postDesc,
                    ':postCont' => $postCont
            );

            if($_FILES['postImg']['size'] !== 0){
                $queryArr[':postImg'] = $picName;
                $stmt->execute($queryArr);
                move_uploaded_file($picTmp, $filedir);
            }else{
                $queryArr[':postImg'] = 'default.jpg';
                $stmt->execute($queryArr);
            }

            
            header('Location: index.php?action=added');
            exit;

        } catch (PDOException $e){
            echo $e->getMessage;
        }
    }
}
//Submit Handeler END

//Check for an errors
if(isset($error)){
    foreach($error as $error){
        echo '<p class="error">'.$error.'</p>';
    }
}

?>

<div class='grid flex-center'>
    <div class='u-23-24 u-md-18-24 fancyBoxShadow'>
        <form action="" method="post" enctype='multipart/form-data'>
            <h2>New Post</h2>
            <label for="postTitle">Title</label>
            <input type="text" name="postTitle" value="<?php if(isset($error)){echo $_POST['postTitle'];}?>">
            <br>
            <label for="postDesc">Short Description</label>
            <br>
            <textarea type="text" name="postDesc" rows='10' value="<?php if(isset($error)){echo $_POST['postDesc'];} ?>"></textarea>
            <br>
            <br>
            <label>Content</label>
            <textarea class="postContent" name='postCont' rows='30'><?php if(isset($error)){echo $_POST['postCont'];} ?></textarea>

            <input type='file' name='postImg'>
            <br>
            <input type='submit' name='submit' value='Submit'>
        </form>
    </div>
</div>



<?php 
require_once './admin-footer.php';
?>