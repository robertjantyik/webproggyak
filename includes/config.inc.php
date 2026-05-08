<?php

session_start();

$ablakcim = array(
    'cim' => 'Mozi webalkalmazás'
);

$fejlec = array(
    'kepforras' => 'images/logo.png',
    'kepalt' => 'Mozi logó',
    'cim' => 'Mozi webalkalmazás',
    'motto' => 'PHP alapú film adatbázis rendszer'
);

$lablec = array(
    'copyright' => 'Copyright ' . date("Y") . '.',
    'ceg' => 'Web-programozás beadandó'
);

$oldalak = array(
    '/' => array(
        'fajl' => 'fooldal',
        'szoveg' => 'Főoldal',
        'menun' => array(1,1)
    ),

    'kepek' => array(
        'fajl' => 'kepek',
        'szoveg' => 'Képek',
        'menun' => array(1,1)
    ),

    'kapcsolat' => array(
        'fajl' => 'kapcsolat',
        'szoveg' => 'Kapcsolat',
        'menun' => array(1,1)
    ),

    'crud' => array(
        'fajl' => 'crud',
        'szoveg' => 'CRUD',
        'menun' => array(1,1)
    ),

    'uzenetek' => array(
        'fajl' => 'uzenetek',
        'szoveg' => 'Üzenetek',
        'menun' => array(0,1)
    ),

    'belepes' => array(
        'fajl' => 'belepes',
        'szoveg' => 'Belépés',
        'menun' => array(1,0)
    ),

    'kilepes' => array(
        'fajl' => 'kilepes',
        'szoveg' => 'Kilépés',
        'menun' => array(0,1)
    ),

    'belep' => array(
        'fajl' => 'belep',
        'szoveg' => '',
        'menun' => array(0,0)
    ),

    'regisztral' => array(
        'fajl' => 'regisztral',
        'szoveg' => '',
        'menun' => array(0,0)
    )
);

$hiba_oldal = array(
    'fajl' => '404',
    'szoveg' => 'A keresett oldal nem található!'
);

/*
|--------------------------------------------------------------------------
| Adatbázis kapcsolat
|--------------------------------------------------------------------------
| Lokálisan XAMPP:
| adatbázis: mozi
| felhasználó: root
| jelszó: üres
|
| Tárhelyen ezt majd át kell írni.
|--------------------------------------------------------------------------
*/

try {
    $dbh = new PDO(
        'mysql:host=localhost;dbname=mozi',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );

    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

} catch (PDOException $e) {
    die("Adatbázis hiba: " . $e->getMessage());
}
?>