<?php
$title = "Devine le nombre";
$nav = "games";
require "../layouts/head.php";

//checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];

//radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];

//checkbox
$supplements = [
    'Pépites de chocolat' => 1,
    'Chantilly' => 0.5
];

function checkbox(string $name, string $value, array $data): string {
    $attributes = '';
    if (isset($data[$name]) && is_array($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= ' checked="checked"';
    }
    return "<input type='checkbox' name='{$name}[]' value='$value' $attributes>";
};

function radio(string $name, string $value, array $data): string {
    $attributes = '';
    if (isset($data[$name]) && $value === $data[$name]) {
        $attributes .= ' checked="checked"';
    }
    return "<input type='radio' name='{$name}' value='$value' $attributes>";
};

//Affichage du prix
$ingredients =  [];
$total = 0;
$error = null;

if (isset($_GET['parfum'])) {
    foreach ($_GET['parfum'] as $parfum) {
        if (isset($parfums[$parfum])) {
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
        }
    }
    if (isset($_GET['cornet'])) {
        $cornet = $_GET['cornet'];
        if (isset($cornets[$cornet])) {
            $ingredients[] = $cornet;
            $total += $cornets[$cornet];
        }
        if (isset($_GET['supplement'])) {
            foreach ($_GET['supplement'] as $supplement) {
                if (isset($supplements[$supplement])) {
                    $ingredients[] = $supplement;
                    $total += $supplements[$supplement];
                }
            }
        }
    } else {
        echo "Veuillez choisir un récipient";
    }
} else {
    echo "Veuillez cocher au moins un parfum";
}
?>

<body>
    <?php require "../layouts/menu.php"; ?>
    <main>
        <h1>Composer votre glace</h1>
        <form action="" method="GET">

            <h2>Choisissez votre parfum</h2>

            <?php foreach ($parfums as $parfum => $prix): ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('parfum', $parfum, $_GET) ?>
                        <?= $parfum ?> - <?= $prix ?>€
                    </label>
                </div>
            <?php endforeach; ?>

            <h2>Choisissez votre récipient</h2>

            <?php foreach ($cornets as $cornet => $prix): ?>
                <div class="checkbox">
                    <label>
                        <?= radio('cornet', $cornet, $_GET) ?>
                        <?= $cornet ?> - <?= $prix ?>€
                    </label>
                </div>
            <?php endforeach; ?>

            <h2>Rajoutez des suppléments</h2>

            <?php foreach ($supplements as $supplement => $prix): ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('supplement', $supplement, $_GET) ?>
                        <?= $supplement ?> - <?= $prix ?>€
                    </label>
                </div>
            <?php endforeach; ?>
            <button type="submit">Composer ma glace</button>
        </form>

        <section>
            <h2 style="text-align: center;">Votre glace</h2>
            <div style="display:flex; justify-content: space-evenly; align-items: center; width: 500px;">
                <?= $error ?>
                <ul><?php foreach ($ingredients as $ingredient): ?>
                        <li><?= $ingredient ?></li>
                    <?php endforeach ?>
                </ul>

                <strong>Prix total : <?= $total ?>€</strong>
            </div>
        </section>
    </main>
</body>