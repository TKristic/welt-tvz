<?php include "inc/header.php" ?>


<?php

$vijest = new Vijest();

if(!($user->isLoggedIn() && $user->isAdmin())) {
    header("Location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_FILES['slika']) && $_FILES['slika']['error'] == UPLOAD_ERR_OK) {
    $slika = $_FILES['slika'];
    
    $imeSlike = basename($slika['name']);
    
    $putanja = 'public/img/' . $imeSlike;
    
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    
    $ext = strtolower(pathinfo($imeSlike, PATHINFO_EXTENSION));
    
    if(in_array($ext, $allowed_ext) && $slika['size'] < 2000000) {
        if(move_uploaded_file($slika['tmp_name'], $putanja)) {
            echo "Slika uspješno prenesena.";
            
            $naslov = $_POST['naslov'];
            $predparagraf = $_POST['predparagraf'];
            $paragraf = $_POST['paragraf'];
            $kategorija = $_POST['kategorija'];

            $vijest->create($imeSlike, $naslov, $predparagraf, $paragraf, $kategorija);

        } else {
            echo "Došlo je do greške pri prenošenju slike.";
        }
    } else {
        echo "Nije uspjelo slanje slike. Provjerite vrstu datoteke i veličinu.";
    }
  } else {
      echo "Nije uspjelo slanje slike. Datoteka nije poslana ili je došlo do greške.";
  }

  
}
?>
<div class="prijava" style="width: 50%; margin: 10% 25%">
    <h2>Dodavanje novih vijesti</h2>
    <p>
        <strong>Upute za postavljanje vijesti</strong> <br>
        <strong>Predparagraf</strong> je onaj tekst koji se pokazuje na index.php na kartici vijesti <br>
        <strong>Slika</strong> samo importajte u predviđeni dio <br><br><br>
    </p>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="polje">
            <label for="slika" class="float-left">Slika:</label>
            <input type="file" name="slika" class="float-right" required>
        </div>
        <div class="polje">
            <label for="naslov" class="float-left">Naslov:</label>
            <textarea name="naslov" class="float-right" required></textarea>
        </div>
        <div class="polje">
            <label for="predparagraf" class="float-left">predparagraf:</label>
            <textarea name="predparagraf" class="float-right" required></textarea>
        </div>
        <div class="polje">
            <label for="paragraf" class="float-left">Paragraf:</label>
            <textarea name="paragraf" class="float-right" required></textarea>
        </div>
        <div class="polje">
            <label for="kategorija" class="float-left">Kategorija:</label>
            <select name="kategorija" class="float-right" required>
                <option value="Politika i Društvo">Politika i Društvo</option>
                <option value="Hrana">Hrana</option>
            </select>
        </div>
        <div class="polje">
            <button type="submit">Dodaj</button>
        </div>
    </form>
</div>

    
    


<?php include "inc/footer.php" ?>