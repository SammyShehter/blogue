<?php if (isset($_POST['do_post'])){
echo '<pre>';var_dump($_POST);die;

}
?>

<form method='POST' action=# id="someform">

<input type="submit" class="btn btn-primary" name="do_post" value="Add Entry to Blogue">
</form>

<select name="numlist" form="someform">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select>
