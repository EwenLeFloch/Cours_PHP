<h2>TP : reconnaitre un palyndrôme</h2>
<?php
   $mot = readline("Entrez une chaîne de caractère: ");
   $inverse = strtolower(strrev($mot));
   if (strtolower($mot) === $inverse) {
    echo "$mot est un palyndrome";
   } else {
    echo "$mot n'est pas un palyndrome" ;
   }
?>