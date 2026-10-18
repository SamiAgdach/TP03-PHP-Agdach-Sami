<?php
require __DIR__ . '/config.php';
require __DIR__ . '/includes/entete_inc.php';
require __DIR__ . '/includes/menu_inc.php';

$notes = [
    'Mohamed' => 16,
    'Ahmed' => 14,
    'Hind' => 13,
    'Aicha' => 15,
    'Yassine' => 12,
    'Lina' => 11,
    'Hamza' => 7,
    'Sami' => 7,
    'Noura' => 14,
];

$modules = ['Mathématiques', 'Informatique', 'Anglais'];

echo '<h2>Modules</h2>';
foreach ($modules as $module) {
    echo $module . '<br>';
}
echo '<br>Premier module : ' . $modules[0];

echo '<h2>Notes</h2>';
echo '<table border="1" cellpadding="8"><tr><th>Nom</th><th>Note</th><th>Mention</th></tr>';
foreach ($notes as $nom => $note) {
    $classe = $note < SEUIL ? 'style="color:red;"' : '';
    echo '<tr ' . $classe . '><td>' . $nom . '</td><td>' . $note . '</td><td>' . mention($note) . '</td></tr>';
}
echo '</table>';

$sum = 0;
$min = null;
$max = null;
foreach ($notes as $note) {
    $sum += $note;
    $min = ($min === null || $note < $min) ? $note : $min;
    $max = ($max === null || $note > $max) ? $note : $max;
}
$nb = count($notes);
$moyenne = $sum / $nb;

echo '<h2>Statistiques</h2>';
echo 'Somme : ' . $sum . '<br>';
echo 'Moyenne : ' . $moyenne . '<br>';
echo 'Meilleure note : ' . $max . '<br>';
echo 'Plus faible note : ' . $min . '<br>';
echo 'array_sum : ' . array_sum($notes) . '<br>';
echo 'count : ' . $nb . '<br>';
echo 'max : ' . max($notes) . '<br>';
echo 'min : ' . min($notes) . '<br>';

$effectifs = ['Très bien' => 0, 'Bien' => 0, 'Assez bien' => 0, 'Passable' => 0, 'Ajourné' => 0];
foreach ($notes as $note) {
    $effectifs[mention($note)] += 1;
}
var_dump($effectifs);

ksort($notes);
echo '<h3>Tableau trié par noms croissants</h3>';
foreach ($notes as $nom => $note) {
    echo $nom . ' : ' . $note . '<br>';
}

arsort($notes);
echo '<h3>Tableau trié par notes décroissantes</h3>';
foreach ($notes as $nom => $note) {
    echo $nom . ' : ' . $note . '<br>';
}

krsort($notes);
echo '<h3>Tableau trié par noms décroissants</h3>';
foreach ($notes as $nom => $note) {
    echo $nom . ' : ' . $note . '<br>';
}

asort($notes);
echo '<h3>Tableau trié par notes croissantes</h3>';
foreach ($notes as $nom => $note) {
    echo $nom . ' : ' . $note . '<br>';
}

echo '<h2>Expérience Include vs Require</h2>';
// Expérience 1 : Inclure deux fois
// include 'includes/menu_inc.php';
// include 'includes/menu_inc.php'; // S'affiche 2 fois
// include_once 'includes/menu_inc.php'; // Ne s'affiche pas une 2ème fois

// Expérience 2 (à tester en commentant le reste du fichier) :
// include 'fichier_inexistant.php'; // Affiche un warning mais continue
// require 'fichier_inexistant.php'; // Fatal error, stoppe le script

require __DIR__ . '/includes/pied_inc.php';

echo '<h2>Exercice 3.5 : Opérateurs de tableaux</h2>';
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo '<pre>';
echo "Résultat de \$a + \$b :\n";
print_r($a + $b); // Union (garde les clés de $a, ignore celles de $b déjà existantes)
echo "\n\$a == \$b : ";
var_dump($a == $b); // true (mêmes paires clés/valeurs)
echo "\n\$a === \$b : ";
var_dump($a === $b); // false (l'ordre est différent)
echo '</pre>';