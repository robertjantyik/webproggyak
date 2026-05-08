<?php

if(!isset($_SESSION['login'])) {

    echo "<div class='hiba'>Az oldal csak bejelentkezés után érhető el.</div>";

}
else {

    $sql = "SELECT * FROM uzenetek
            ORDER BY kuldes_ideje DESC";

    $stmt = $dbh->query($sql);

    $uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h2>Beérkezett üzenetek</h2>

<table>

    <tr>
        <th>Név</th>
        <th>Email</th>
        <th>Üzenet</th>
        <th>Felhasználó</th>
        <th>Küldés ideje</th>
    </tr>

    <?php foreach($uzenetek as $u): ?>

        <tr>

            <td><?= $u['nev'] ?></td>

            <td><?= $u['email'] ?></td>

            <td><?= $u['uzenet'] ?></td>

            <td><?= $u['felhasznalo'] ?></td>

            <td><?= $u['kuldes_ideje'] ?></td>

        </tr>

    <?php endforeach; ?>

</table>

<?php } ?>
