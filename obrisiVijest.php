<?php include "inc/header.php" ?>


<?php

$vijest = new Vijest();
$vijesti = $vijest->fetch_all_vijesti();

if(!($user->isLoggedIn() && $user->isAdmin())) {
    header("Location: index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $vijest->delete($id);
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="prijava" style="width: 100%; margin: 10% 0; text-align:left;">
    <h2>Brisanje vijesti</h2>
    
    <table style="width: 100%;">
        <tr>
            <td><strong>Naslov</strong></td>
            <td><strong>Kategorija</strong></td>
            <td><strong>Kreirano</strong></td>
            <td><strong>Obriši</strong></td>
        </tr>
        <?php foreach($vijesti as $element): ?>
            <tr>
                <td><?=$element['naslov'] ?></td>
                <td><?=$element['kategorija'] ?></td>
                <td><?=$element['stvoreno'] ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?=$element['news_id'] ?>">
                        <button type="submit">Obrisi vijest</button>
                    </form> 
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

    
    


<?php include "inc/footer.php" ?>