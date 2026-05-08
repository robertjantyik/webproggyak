<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ablakcim['cim'] ?></title>

    <link rel="stylesheet" href="./styles/stilus.css">
    <link rel="stylesheet" href="./styles/tablazat.css">
</head>
<body>

<header>
    <div class="header-container">
        <img src="<?= $fejlec['kepforras'] ?>" alt="<?= $fejlec['kepalt'] ?>" class="logo">

        <div>
            <h1><?= $fejlec['cim'] ?></h1>
            <p><?= $fejlec['motto'] ?></p>
        </div>
    </div>

    <?php if(isset($_SESSION['login'])): ?>
        <div class="bejelentkezett">
            Bejelentkezett:
            <?= $_SESSION['csn'] . " " . $_SESSION['un'] ?>
            (<?= $_SESSION['login'] ?>)
        </div>
    <?php endif; ?>
</header>

<nav>
    <ul>
        <?php foreach($oldalak as $url => $oldal): ?>

            <?php if(
                (!isset($_SESSION['login']) && $oldal['menun'][0]) ||
                (isset($_SESSION['login']) && $oldal['menun'][1])
            ): ?>

                <li>
                    <a href="<?= ($url == '/') ? '.' : ('?' . $url) ?>">
                        <?= $oldal['szoveg'] ?>
                    </a>
                </li>

            <?php endif; ?>

        <?php endforeach; ?>
    </ul>
</nav>

<main>

    <?php
        if(file_exists("./logicals/{$keres['fajl']}.php")) {
            include("./logicals/{$keres['fajl']}.php");
        }

        include("./templates/pages/{$keres['fajl']}.tpl.php");
    ?>

</main>

<footer>
    <p><?= $lablec['copyright'] ?></p>
    <p><?= $lablec['ceg'] ?></p>
    <p>Készítette: Kovács Kevin Izsák - LXK94M</p>
    <p>Készítette: Jantyik Róbert - H8O0EL</p>
</footer>

</body>
</html>
