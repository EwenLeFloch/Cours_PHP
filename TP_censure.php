<?php
$insultes = ["con", "merde"];

while (true) {
    $phrase = readline("Entrez une phrase (ou tapez exit pour quitter): ");
    if (strtolower($phrase) === "exit") {
        break;
    }

foreach ($insultes as $insulte) {
    $taille = strlen($insulte);
    $firstLetter = substr($insulte, 0, 1);
    $replace = $firstLetter . str_repeat("*", $taille - 1);
    $phrase = str_replace($insultes, $replace, $phrase);
}

echo "$phrase \n";
}