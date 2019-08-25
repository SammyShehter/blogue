<?php echo '<pre>';
$filename = $_SERVER['SCRIPT_FILENAME'];
if($filename === __DIR__.'/test.php'){
  echo 'true';
}else{
  echo 'false';
}


echo '<pre>';
$filename = $_SERVER['SCRIPT_FILENAME'];
var_dump($_SERVER);