<?php


function repondre_oui_non(string $question = "Voulez-vous continuer ?"): bool {
    while (true) {
        $reponse = readline($question . " - (o)ui/(n)on : ");

        if ($reponse === "o") {
            return true;
        } elseif ($reponse === "n") {
            return false;
        }
    }
}



function demander_creneau(?string $phrase = null): array {
    echo $phrase . "\n";
    while (true) {
        $start = (int)readline("Quel est votre heure de début ?\n");

        if ($start < 8 || $start > 20) {
            echo "Merci de rentrer une heure comprise entre 8h et 20h\n";
        } else {
            while (true) {
                $end = readline("Quel est votre heure de fin ?\n"); {
                    if ($end < 9 || $end > 21) {
                        echo "Merci de rentrer une heure de fin comprise en 9h et 21h\n";
                    } else if ($end <= $start) {
                        echo "Votre heure de fin ne peut pas être avant l'heure de début\n";
                    } else {
                        return [$start, $end];
                    }
                }
            }
        }
    }
}

function demander_creneaux(string $phrase = "Quels sont vos créneaux ?"): array {
    echo $phrase . "\n";
    $creneaux = [];
    $continuer = true;
    while ($continuer) {

        $creneaux[] = demander_creneau();
        $continuer = repondre_oui_non();
    }
    return $creneaux;
}

$creneaux = demander_creneaux();
print_r($creneaux);
