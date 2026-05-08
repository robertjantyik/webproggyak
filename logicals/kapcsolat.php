<?php

$hiba = "";
$siker = "";

if(isset($_POST['nev'])) {

    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $uzenet = trim($_POST['uzenet']);

    /*
    |--------------------------------------------------------------------------
    | PHP validáció
    |--------------------------------------------------------------------------
    */

    if($nev == "" || $email == "" || $uzenet == "") {

        $hiba = "Minden mező kitöltése kötelező.";

    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $hiba = "Hibás email cím.";

    }
    else {

        $felhasznalo = "Vendég";

        if(isset($_SESSION['login'])) {
            $felhasznalo = $_SESSION['login'];
        }

        $sql = "INSERT INTO uzenetek
                (nev, email, uzenet, felhasznalo)
                VALUES
                (:nev, :email, :uzenet, :felhasznalo)";

        $stmt = $dbh->prepare($sql);

        $stmt->execute(array(
            ':nev' => $nev,
            ':email' => $email,
            ':uzenet' => $uzenet,
            ':felhasznalo' => $felhasznalo
        ));

        $siker = "Az üzenet elküldve.";
    }
}
?>