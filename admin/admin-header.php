<?php
require_once '../includes/config.php';
if($filename == __DIR__.'/admin-header.php' || $filename == __DIR__.'/admin-footer.php'){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Blogue_Admin</title>
</head>
<body>
<?php 
$filename = $_SERVER['SCRIPT_FILENAME'];
if($filename == __DIR__.'/index.php' ){
?>
<header>
    <div class="adminMenu row">
        <h3 class='flex-center'>Hi Sammy! =)</h3>
        <div>
            <button><a href="./add-post.php">Add new post</a></button>
            <button><a href="../">Visit Website</a></button>
        </div>
        
    </div>
</header>
<?php
}

if($filename == __DIR__.'/edit-post.php' || $filename == __DIR__.'/add-post.php'){
?>
<script src="./textarea.js"></script>
<script>
    tinymce.init({
    selector:'.postContent',
    plugins: "anchor"
    });
</script>

<header>
    <div class="adminMenu row">
        <h3 class='flex-center'>What's on your mind?</h3>
        <div>
            <button><a href="./index.php">Back</a></button>
            <button><a href="<?php echo $config['links']['homepage']; ?>">Visit Website</a></button>
        </div>
    </div>
</header>
<?php
}
?>