<?php
session_start();
$_SESSION['role'] = ['administrateur'];
$title = "Accueil";
$nav = "index";
require "src/layouts/head.php";
?>

<body>
    <?php require "src/layouts/menu.php"; ?>
    <main class="main">
        <a href=" src/pages/introduction.php">Introduction / Installation de l'environnement de travail</a>
    </main>
</body>