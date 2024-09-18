<?php
date_default_timezone_set('Europe/Paris');
$title = "TP - Horaires";
require "../layouts/head.php";
require "../config.php";

$datetime = $_GET['datetime'] ?? null;
$heure = $datetime ? (int)date('G', strtotime($datetime)) : (int)date('G');
$jour = $datetime ? (int)date('N', strtotime($datetime)) : (int)date('N');

$creneaux = CRENEAUX[$jour - 1];
$ouvert = in_creneau($heure, $creneaux);
$color = $ouvert ? "green" : "red";



function creneaux_html(array $creneaux) {
    if (empty($creneaux)) {
        return "Fermé";
    }
    $phrases = [];
    foreach ($creneaux as $creneau) {
        $phrases[] = "de <strong>{$creneau[0]}h </strong> à <strong>{$creneau[1]}h</strong>";
    }
    return "Ouvert " . implode(' et ', $phrases);
}

function in_creneau(int $heure, array $creneaux): bool {
    foreach ($creneaux as $creneau) {
        $debut = $creneau[0];
        $fin = $creneau[1];

        if ($heure >= $debut && $heure < $fin) {
            return true;
        }
    }
    return false;
}
?>

<body>

    <main>
        <h2>Horaires d'ouverture</h2>
        <?php if ($ouvert): ?> <strong>Le magasin est ouvert</strong> <?php else: ?> <strong>Le magasin est fermé</strong><?php endif ?>
        <?= date('l'); ?>
        <ul>
            <?php foreach (JOURS as $k => $jourName): ?>
                <li <?php if ($k + 1 === $jour): ?> style="color: <?= $color ?>" <?php endif ?>>
                    <strong><?= $jourName ?>: </strong><?= creneaux_html(CRENEAUX[$k]); ?>
                <?php endforeach ?>
                </li>
        </ul>

        <form action="" method="GET">
            <div>
                <label for="datetime">Vérifiez l'ouverture du magasin pour :</label>
                <input type="datetime-local" name="datetime" id="datetime">
                <button type="submit">Envoyer</button>
            </div>

        </form>


    </main>
</body>

</html>