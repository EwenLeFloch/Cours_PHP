<?php
$title = "Devine le nombre";
$nav = "games";
require "../layouts/head.php";

$aDeviner = 250;
$erreur = null;
$succes = null;
$value = null;

if (isset($_POST['chiffre'])) {
    $value = (int)$_POST['chiffre'];
    if ($value > $aDeviner) {
        $erreur = 'Votre nombre est trop grand';
    } else if ($value < $aDeviner) {
        $erreur = 'Votre nombre est trop petit';
    } else {
        $succes = "<p>Bravo ! Vous avez deviné le nombre <strong>$aDeviner</strong></p>";
    }
}
?>

<body>
    <?php require "../layouts/menu.php"; ?>
    <main>
        <form action="" method="POST">
            <input type="number" name="chiffre" placeholder="entre 0 et 1000" value="<?= $value ?>">
            <button type="submit">Devinez</button>
        </form>

        <?php if ($erreur) {
            echo "<p>$erreur</p>";
        } else if ($succes) {
            echo $succes;
        } ?>

    </main>
</body>