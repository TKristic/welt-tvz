<?php 
require_once 'inc/header.php';

$vijesti = new Vijest();
$politika = $vijesti->fetch_all_politika();
$hrana = $vijesti->fetch_all_hrana();
?>
        <section>
            <h2 id="politika">Politika i Društvo</h2>
            <div class="row">
                <?php foreach($politika as $element): ?>
                    <div class="col-md-4">
                        <article>
                            <img src="public/img/<?=$element['slika']?>" alt="">
                            <h4><?=$element['naslov']?></h4>
                            <p><?=$element['predparagraf']?></p>
                            <span><?=$element['stvoreno']?></span>
                            <button onclick="window.location.href='clanak.php?news_id=<?= $element['news_id'] ?>'">pročitaj</button>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section>
            <h2 id="hrana">Hrana</h2>
            <div class="row">
            <?php foreach($hrana as $element): ?>
                    <div class="col-md-4">
                        <article>
                            <img src="public/img/<?=$element['slika']?>" alt="">
                            <h4><?=$element['naslov']?></h4>
                            <p><?=$element['predparagraf']?></p>
                            <span><?=$element['stvoreno']?></span>
                            <button onclick="window.location.href='clanak.php?news_id=<?= $element['news_id'] ?>'">pročitaj</button>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    

<?php require_once 'inc/footer.php' ?>