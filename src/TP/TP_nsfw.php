<?php
$title = "NSFW filter";
$nom = null;
$age = null;

if (!empty($_GET['action']) && $_GET['action'] === "return") {
    unset($_COOKIE['birthday']);
}
if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    $_COOKIE['birthday'] = $_POST['birthday'];
}
if (!empty($_COOKIE['birthday'])) {
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}

require "../layouts/head.php";
$i = null;

?>

<body>
    <?php require "../layouts/menu.php" ?>
    <main>
        <?php if ($age >= 18): ?>
            <h1>Bonjour vous pouvez continuer</h1>
            <a href="TP_nsfw.php?action=return">Retour</a>
        <?php elseif ($age): ?>
            <p>Vous n'avez pas l'age requis</p>
            <a href="TP_nsfw.php?action=return">Retour</a>
        <?php else: ?>
            <form action="" method="post">
                <div>
                    <label for="birthday">Section réservée aux adultes, veuillez entrer votre année de naissance</label>
                    <select name="birthday" id="birthday">
                        <?php for ($i = 2010; $i > 1919; $i--): ?>
                            <option value=" <?= $i ?>"><?= $i ?> </option>
                        <?php endfor ?>
                    </select>
                </div>
                <button type="submit">Envoyer</button>
            </form>
        <?php endif ?>
    </main>
</body>

</html>