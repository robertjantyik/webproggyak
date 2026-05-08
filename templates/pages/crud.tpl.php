<h2>Film CRUD alkalmazás</h2>

<p>
    Ebben a modulban lehet filmeket hozzáadni, módosítani és törölni
    az adatbázisból.
</p>

<?php if($uzenet != ""): ?>

    <div class="siker">
        <?= $uzenet ?>
    </div>

<?php endif; ?>

<div class="form-container">

    <h3>Új film hozzáadása</h3>

    <form method="post" action="?crud">

        <input type="hidden" name="muvelet" value="hozzaad">

        <label>Film címe</label>
        <input type="text" name="cim">

        <label>Megjelenés éve</label>
        <input type="number" name="ev">

        <label>Film hossza (perc)</label>
        <input type="number" name="hossz">

        <button type="submit">
            Hozzáadás
        </button>

    </form>

</div>

<hr>

<h3>Filmek listája</h3>

<table>

    <tr>
        <th>ID</th>
        <th>Cím</th>
        <th>Év</th>
        <th>Hossz</th>
        <th>Műveletek</th>
    </tr>

    <?php foreach($filmek as $film): ?>

        <tr>

            <form method="post" action="?crud">

                <td>
                    <?= $film['id'] ?>
                    <input type="hidden" name="id" value="<?= $film['id'] ?>">
                </td>

                <td>
                    <input
                        type="text"
                        name="cim"
                        value="<?= $film['cim'] ?>"
                    >
                </td>

                <td>
                    <input
                        type="number"
                        name="ev"
                        value="<?= $film['ev'] ?>"
                    >
                </td>

                <td>
                    <input
                        type="number"
                        name="hossz"
                        value="<?= $film['hossz'] ?>"
                    >
                </td>

                <td>

                    <button
                        class="muvelet-gomb"
                        type="submit"
                        name="muvelet"
                        value="modosit"
                    >
                        Mentés
                    </button>

                    <button
                        class="muvelet-gomb"
                        type="submit"
                        name="muvelet"
                        value="torol"
                        onclick="return confirm('Biztosan törölni szeretnéd?')"
                    >
                        Törlés
                    </button>

                </td>

            </form>

        </tr>

    <?php endforeach; ?>

</table>
