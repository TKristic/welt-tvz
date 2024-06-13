<?php include "inc/header.php" ?>

<?php
require_once "classes/User.php"; 

if($user->isLoggedIn()) {
    header("Location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $user->login($username, $password);

    if(!$result) {
        header("Location: login.php");
        exit();
    } 

    header("Location: index.php");
    exit();
}
?>
<div class="prijava">
    <h2>prijavite se</h2>
    <p>U edukativne svrhe za administracijske <br> permisije pristup je <strong>admin:admin</strong></p>
    <form action="" method="post">
        <div class="polje">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
         <br>
        <div class="polje">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <br>
        <button type="submit">Login</button> 
    </form>
    <br>
    <a href="register.php">registracija</a>
</div>
    

<?php include "inc/footer.php" ?>