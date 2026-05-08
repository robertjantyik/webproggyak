<?php

$uzenet = "";

/*
|--------------------------------------------------------------------------
| CREATE
|--------------------------------------------------------------------------
*/

if(isset($_POST['muvelet']) && $_POST['muvelet'] == 'hozzaad') {

    $cim = trim($_POST['cim']);
    $ev = trim($_POST['ev']);
    $hossz = trim($_POST['hossz']);

    if($cim != "" && $ev != "" && $hossz != "") {

        $sql = "INSERT INTO film (cim, ev, hossz)
                VALUES (:cim, :ev, :hossz)";

        $stmt = $dbh->prepare($sql);

        $stmt->execute(array(
            ':cim' => $cim,
            ':ev' => $ev,
            ':hossz' => $hossz
        ));

        $uzenet = "Film sikeresen hozzáadva.";
    }
    else {
        $uzenet = "Minden mező kitöltése kötelező.";
    }
}

/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/

if(isset($_POST['muvelet']) && $_POST['muvelet'] == 'torol') {

    $id = $_POST['id'];

    $sql = "DELETE FROM film WHERE id = :id";

    $stmt = $dbh->prepare($sql);

    $stmt->execute(array(
        ':id' => $id
    ));

    $uzenet = "Film törölve.";
}

/*
|--------------------------------------------------------------------------
| UPDATE
|--------------------------------------------------------------------------
*/

if(isset($_POST['muvelet']) && $_POST['muvelet'] == 'modosit') {

    $id = $_POST['id'];
    $cim = trim($_POST['cim']);
    $ev = trim($_POST['ev']);
    $hossz = trim($_POST['hossz']);

    if($cim != "" && $ev != "" && $hossz != "") {

        $sql = "UPDATE film
                SET cim = :cim,
                    ev = :ev,
                    hossz = :hossz
                WHERE id = :id";

        $stmt = $dbh->prepare($sql);

        $stmt->execute(array(
            ':cim' => $cim,
            ':ev' => $ev,
            ':hossz' => $hossz,
            ':id' => $id
        ));

        $uzenet = "Film módosítva.";
    }
    else {
        $uzenet = "Minden mező kitöltése kötelező.";
    }
}

/*
|--------------------------------------------------------------------------
| READ
|--------------------------------------------------------------------------
*/

$sql = "SELECT * FROM film ORDER BY id DESC";

$stmt = $dbh->query($sql);

$filmek = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>