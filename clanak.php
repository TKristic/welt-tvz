<?php 
require_once 'inc/header.php';
require_once 'classes/Komentar.php';

$vijest = new Vijest();
$vijest = $vijest->read($_GET['news_id']);

$komentar = new Komentar();
$komentari_list = $komentar->fetch_all_komentari($vijest['news_id']);
?>

<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $novi_komentar = $_POST['komentar'];
    $komentar->create($_SESSION['user_id'], $vijest['news_id'], $novi_komentar);
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<?php 

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $komentar_id = $_GET['id'];
    $komentar->obrisi($komentar_id);
    header('Location: index.php');
    exit();
}

?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="clanak">
            <img src="public/img/<?=$vijest['slika']?>" alt="">
            <h1><?=$vijest['naslov'] ?></h1>
            <p><?=$vijest['paragraf'] ?></p>
            <span><?=$vijest['stvoreno'] ?></span>
            <br><br><br>
            <h2>KOMENTARI</h2>
            <br>
            <?php if($user->isLoggedIn()): ?>
                <h5>Unesite svoj komentar</h5>
                <form action="" method="POST">
                    <textarea name="komentar" style="width: 100%; resize: none;"></textarea> <br><br>
                    <button type="submit">Komentiraj</button>
                </form>
                <br><br><br>
            <?php endif; ?>
            <?php foreach($komentari_list as $kom): ?>
                <h3><?= $komentar->get_username($kom['user_id']) ?></h3>
                <p><?= $kom['sadrzaj'] ?></p>
                <?php if(isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $kom['user_id'] || $user->isAdmin())): ?>
                    <form action="" method="GET">
                        <input type="hidden" name="id" value="<?=$kom['comm_id'] ?>">
                        <button type="submit">Obrisi Komentar</button>
                    </form> 
                <?php endif; ?>
                <br>
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="col-md-2"></div>
</div>

<?php require_once 'inc/footer.php' ?>