<?php

require_once './admin-header.php';

//if not logged in redirecting to login page
if($user->is_logged_in()){ header('Location: index.php'); exit; }
?>

<div class='authForm flex-center'>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" value="" />
        <input type="password" name="password" placeholder="Password" value="" />
        <button type="submit" name="submit">Login</button>
    </form>
</div>

<script>

const body = document.querySelector('body');

async function date() {
    let clock = new Date().getHours();

    if(clock > 7 && clock < 19){
        body.style.background = 'url("./admin_scss/background/12.jpg") center';
        body.style.backgroundSize = 'cover';
    }else{
        body.style.background = 'url("./admin_scss/background/24.jpg") center';
        body.style.backgroundSize = 'cover';
    }
} 
date();
setInterval(date,1000*60*60);
</script>



<?php

require_once './admin-footer.php';


//process login form if submitted
if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($user->login($username,$password)){
        header('Location:index.php');
        exit;
    } else {
        $message = "<p class='error'>Wrong username or password</p>";
    }
}

if(isset($message)){ echo $message; }

?>