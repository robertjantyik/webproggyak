<?php

$upload_uzenet = "";

if(isset($_FILES['kep'])) {

    if(!isset($_SESSION['login'])) {

        $upload_uzenet = "Csak bejelentkezett felhasználó tölthet fel képet.";

    }
    else {

        $fajlnev = basename($_FILES['kep']['name']);
        $cel = "./uploads/" . $fajlnev;

        $tipus = strtolower(pathinfo($cel, PATHINFO_EXTENSION));

        $engedelyezett = array('jpg', 'jpeg', 'png', 'gif');

        if(in_array($tipus, $engedelyezett)) {

            if(move_uploaded_file($_FILES['kep']['tmp_name'], $cel)) {

                $sql = "INSERT INTO kepek
                        (fajlnev, feltolto)
                        VALUES
                        (:fajlnev, :feltolto)";

                $stmt = $dbh->prepare($sql);

                $stmt->execute(array(
                    ':fajlnev' => $fajlnev,
                    ':feltolto' => $_SESSION['login']
                ));

                $upload_uzenet = "Kép sikeresen feltöltve.";

            }
            else {

                $upload_uzenet = "Hiba a feltöltés során.";

            }

        }
        else {

            $upload_uzenet = "Csak képfájl tölthető fel.";

        }
    }
}
?>