<?php include 'inc/header.php' ?>

<?php
require_once "classes/User.php"; 

if($user->isLoggedIn()) {
    header("Location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $noviKorisnik = $user->create($name, $username, $email, $password);

    if($noviKorisnik) {
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['text'] = "Uspjesna registracija";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message']['type'] = "danger";
        $_SESSION['message']['text'] = "Error 2 : Neuspjesna registracija";
        header("Location: register.php");
        exit();
    }
}
?>

<div class="prijava">
    <h2>Registracija</h2>
    <form action="" method="post">
        <div class="polje">
            <label for="name" class="float-left">Ime</label>
            <input type="text" name="name" id="name" class="float-right" required>
        </div>
        <div class="polje">
            <label for="username" class="float-left">Korisničko ime</label>
            <input type="text" name="username" id="username" class="float-right" required>
        </div>
        <div class="polje">
            <label for="email" class="float-left">email</label>
            <input type="email" name="email" id="email" class="float-right" required>
            </div>
        <div class="polje">
            <label for="password" class="float-left">Lozinka</label>
            <input type="password" name="password" id="password" class="float-right" required>
        </div>
         <br><br><br><br>
        <button type="submit">Registriraj</button>
    </form>
</div>

<?php include 'inc/footer.php' ?>