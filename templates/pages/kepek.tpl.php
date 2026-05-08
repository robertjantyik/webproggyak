<?php include("./logicals/upload.php"); ?>

<h2>Képgaléria</h2>

<p>
    Az oldalon filmekhez kapcsolódó képek találhatók.
</p>

<?php if($upload_uzenet != ""): ?>

    <div class="siker">
        <?= $upload_uzenet ?>
    </div>

<?php endif; ?>

<?php if(isset($_SESSION['login'])): ?>

    <div class="form-container">

        <h3>Kép feltöltése</h3>

        <form method="post" enctype="multipart/form-data">

            <input type="file" name="kep">

            <button type="submit">
                Feltöltés
            </button>

        </form>

    </div>

<?php endif; ?>

<hr>

<div class="galeria">

<?php

$sql = "SELECT * FROM kepek
        ORDER BY feltoltes_ideje DESC";

$stmt = $dbh->query($sql);

$kepek = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($kepek as $kep):

?>

    <div>

        <img
            src="./uploads/<?= $kep['fajlnev'] ?>"
            alt="Kép"
        >

        <p>
            Feltöltő:
            <?= $kep['feltolto'] ?>
        </p>

    </div>

<?php endforeach; ?>

</div>
