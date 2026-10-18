<?php
require __DIR__ . '/config.php';

// Variables valides : $x, $_x, $Prix_HT, $état
// $x : valide
// $_x : valide
// $2x : invalide (commence par un chiffre)
// $x-y : invalide (caractère '-' interdit)
// $Prix_HT : valide
// $prix ht : invalide (espace interdit)
// $état : valide mais non recommandé à cause des caractères accentués

$x = 10;
$_x = 20;
$Prix_HT = 100;
$état = 'actif';

$a = 5;
$A = 8;

echo '<h2>Constantes</h2>';
var_dump(ETABLISSEMENT, NOTE_MIN, NOTE_MAX, SEUIL);
echo '<br>';
echo 'defined(SEUIL) = ' . (defined('SEUIL') ? 'true' : 'false') . '<br>';
echo 'defined(INCONNUE) = ' . (defined('INCONNUE') ? 'true' : 'false') . '<br>';
// Si on affiche une constante non définie, PHP émet un warning et affiche une valeur vide.
// const est compilée au chargement du fichier ; define() est dynamique et peut être utilisée dans des conditions.
# Ceci est un commentaire de type shell
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);
echo '<p>Le prix TTC du produit est de ' . $prix_ttc . ' €.</p>';

$test = 42;
$testString = (string) $test;
var_dump($testString);

$vals = [0, 0.0, '0', '', 'abc', [], null];
foreach ($vals as $v) {
    echo '<br>' . var_export($v, true) . ' => ' . ((bool) $v ? 'true' : 'false');
}

echo '<br> (int) 3.9 = ' . (int) 3.9;
echo '<br> (int) "12abc" = ' . (int) '12abc';
echo '<br> (float) "1.5e3" = ' . (float) '1.5e3';
echo '<br> (int) true = ' . (int) true;

echo '<br>255 en décimal = 255';
echo '<br>255 en hexadécimal = 0xFF';
echo '<br>255 en octal = 0377';
echo '<br>255 en binaire = 0b11111111';

$traitees = 'égales à';
$ici = 2;
echo '<br>';
echo 'Ahmed a dit : "J\'ai réussi"';
echo '<br>Voulez-vous supprimer C:\\*.*?';
echo '<br>Ceci n\'affichera pas \n de nouvelle ligne';
echo '<br>Les variables ne seront pas $traitees $ici';
echo '<br>Les variables seront ' . $traitees . ' ' . $ici;

$chaine = '*Bonjour les développeurs*';
$trimmed = trim($chaine, '*');
echo '<br>Trim : ' . $trimmed;

$mot = 'bonjour';
for ($i = 0; $i < strlen($mot); $i++) {
    echo '<br>' . $mot[$i];
}
