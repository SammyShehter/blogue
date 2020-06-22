<?php
require_once '../includes/config.php';

//if not logged in redirecting to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>

<br>
<br>
<center><h1>You're inside</h1></center>

<form action="" method="post">

    <button name="logout">Logout</button>

</form>

<?php
    if(isset($_POST['logout'])){
        $user->logout();
        header('Location: login.php');
    }
?>