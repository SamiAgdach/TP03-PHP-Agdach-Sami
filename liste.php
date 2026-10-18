<?php
require __DIR__ . '/config.php';

$csvPath = __DIR__ . '/Data/notes.csv';
if (!file_exists($csvPath)) {
    echo 'Le fichier Data/notes.csv est introuvable.';
    exit;
}

$handle = fopen($csvPath, 'r');
if ($handle === false) {
    echo 'Impossible d\'ouvrir le fichier notes.csv.';
    exit;
}

echo '<h2>Liste des notes</h2>';
echo '<table border="1" cellpadding="8"><tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>';
$total = 0;
$count = 0;
while (($ligne = fgetcsv($handle, 1000, ';')) !== false) {
    if ($ligne === [null] || count($ligne) < 3) {
        continue;
    }

    $nom = trim($ligne[0]);
    $info = (float) $ligne[1];
    $math = (float) $ligne[2];
    $moyenne = ($info + $math) / 2;
    $total += $moyenne;
    $count++;

    echo '<tr>';
    echo '<td>' . htmlspecialchars($nom) . '</td>';
    echo '<td>' . $info . '</td>';
    echo '<td>' . $math . '</td>';
    echo '<td>' . number_format($moyenne, 2, ',', ' ') . '</td>';
    echo '<td>' . mention($moyenne) . '</td>';
    echo '</tr>';
}

echo '</table>';
if ($count > 0) {
    echo '<p>Moyenne générale de la classe : ' . number_format($total / $count, 2, ',', ' ') . '</p>';
}

fclose($handle);

echo '<h2>Lecture bas niveau avec fgets et explode</h2>';
$handle2 = fopen($csvPath, 'r');
while (!feof($handle2)) {
    $ligne = fgets($handle2);
    if ($ligne) {
        $tab = explode(';', trim($ligne));
        // Vérifie qu'on a bien 3 éléments
        if (count($tab) >= 3) {
            echo $tab[0] . ' - Info: ' . $tab[1] . ' - Math: ' . $tab[2] . '<br>';
        }
    }
}
fclose($handle2);