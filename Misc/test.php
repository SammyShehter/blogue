<?php if (isset($_POST['do_post'])){
echo '<pre>';var_dump($_POST);die;
echo "INSERT INTO `articles` (`title`, `text`, `categorie_id`, `pubdate`, `images`) VALUES ('".$_POST["1"]."', '".$_POST["2"]."', '".$cat['id']."', current_timestamp(), NULL)";
}
?>

<form method='POST' action=#>
<input type="checkbox" name="1" value='SamirWriteCode'>A<br>
<input type="checkbox" name="2">B<br>
<input type="checkbox" name="3">C<br>
<input type="checkbox" name="4">D<br>
<input type="checkbox" name="5">E<br>
<input type="checkbox" name="6">F<br>
<input type="submit" class="btn btn-primary" name="do_post" value="Add Entry to Blogue">
</form>
