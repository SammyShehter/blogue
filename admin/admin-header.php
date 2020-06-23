<?php
require_once '../includes/config.php';
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

if($filename !== __DIR__.'/login.php'){
?>
<header>

</header>
<?php
}

if($filename == __DIR__.'/edit-post.php' || $filename == __DIR__.'/add-post.php'){
?>
<script src="./textarea.js"></script>
<script>tinymce.init({
    selector:'textarea',
    plugins: "anchor"
    });</script>
<?php
}
?>