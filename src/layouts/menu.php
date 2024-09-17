<header class="header">
    <nav class="header__nav">
        <ul class="header__list">
            <li class="header__item "><a class="header__link <?php if ($nav === "index"): ?>header--active<?php endif; ?>" href="/index.php">Accueil</a></li>
            <li class="header__item"><a class="header__link <?php if ($nav === "games"): ?>header--active<?php endif; ?>" href="/src/pages/games.php">Jeux</a></li>
        </ul>
    </nav>
</header>