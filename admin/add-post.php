<?php
require_once './admin-header.php';
?>

<?php

    //Post Texts
    $postTitle = $_POST['postTitle'];
    $postCont = $_POST['postCont'];
    $postDesc = $_POST['postDesc'];
    //Post Img
    $picTmp = $_FILES['postImg']['tmp_name'];
    $picSize = $_FILES['postImg']['size'];
    $picName = $_FILES['postImg']['name'];
    $picType = $_FILES['postImg']['type'];
    $path = '../includes/pictures/';
    $filedir = $path.$picName;

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



        if(!isset($error)){

            try{

                $stmt = $db->prepare('INSERT INTO blogue_posts (postTitle, postImg, postDesc, postCont) VALUES (:postTitle, :postImg, :postDesc, :postCont)');
                $stmt->execute(array(
                    ':postTitle' => $postTitle,
                    ':postImg' => $picName,
                    ':postDesc' => $postDesc,
                    ':postCont' => $postCont
                ));

                move_uploaded_file($picTmp, $filedir);

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
            <input type="text" name="postTitle" value="<?php if(isset($error)){echo $_POST['postTitle'];}?>">
            <br>
            <label for="postDesc">Short Description</label>
            <input type="text" name="postDesc" value="<?php if(isset($error)){echo $_POST['postDesc'];}?>">
            <br>
            <label>Content</label>
            <textarea name='postCont' rows='30'value='<?php if(isset($error)){ echo $_POST['postCont'];} ?>'></textarea>

            <input type='file' name='postImg'><?php if(isset($error))?>
            <br>
            <input type='submit' name='submit' value='Submit'>
        </form>
    </div>
</div>



<?php 
require_once './admin-footer.php';
?>