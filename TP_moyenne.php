<?php
$notes = [10, 20, 13];
$somme = array_sum($notes);
$compteur = count($notes);
$moyenne = $somme / $compteur;

echo "La moyenne est de " . round($moyenne, 2); 