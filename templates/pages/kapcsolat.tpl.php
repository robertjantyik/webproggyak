<h2>Kapcsolat</h2>

<p>
    Az alábbi űrlap segítségével üzenetet küldhet az oldal üzemeltetőjének.
</p>

<?php if($hiba != ""): ?>

    <div class="hiba">
        <?= $hiba ?>
    </div>

<?php endif; ?>

<?php if($siker != ""): ?>

    <div class="siker">
        <?= $siker ?>
    </div>

<?php endif; ?>

<div class="form-container">

    <form method="post" action="?kapcsolat" onsubmit="return ellenoriz();">

        <label>Név</label>
        <input type="text" name="nev" id="nev">

        <label>Email cím</label>
        <input type="text" name="email" id="email">

        <label>Üzenet</label>
        <textarea name="uzenet" id="uzenet" rows="6"></textarea>

        <button type="submit">
            Üzenet küldése
        </button>

    </form>

</div>

<script>

function ellenoriz() {

    const nev = document.getElementById("nev").value.trim();
    const email = document.getElementById("email").value.trim();
    const uzenet = document.getElementById("uzenet").value.trim();

    if(nev === "" || email === "" || uzenet === "") {
        alert("Minden mező kitöltése kötelező.");
        return false;
    }

    if(!email.includes("@")) {
        alert("Hibás email cím.");
        return false;
    }

    return true;
}

</script>
