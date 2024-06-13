<?php 
require_once 'config/config.php';
require_once 'classes/Vijest.php';
require_once 'classes/User.php';

$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Welt</title>
</head>
<body>

    <div class="container">
            <header>
                <h1>WELT</h1>
                <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#politika">Politika i Društvo</a></li>
                    <li><a href="#hrana">Hrana</a></li>
                    <?php if(!$user->isLoggedIn()): ?>
                        <li><a href="prijava.php">Prijava</a></li>
                        <li><a href="registracija.php">Registracija</a></li>
                    <?php elseif($user->isAdmin()): ?>
                        <li><a href="dodajVijest.php">Dodaj Vijest</a></li>
                        <li><a href="obrisiVijest.php">Obrisi Vijest</a></li>
                        <li><a href="odjava.php">Odjava</a></li>
                    <?php else: ?>  
                        <li><a href="odjava.php">Odjava</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            </header>