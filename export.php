<?php
require __DIR__ . '/config.php';

$csvPath = __DIR__ . '/Data/notes.csv';
if (!file_exists($csvPath)) {
    echo 'Le fichier notes.csv n\'existe pas.';
    exit;
}

$rows = [];
$handle = fopen($csvPath, 'r');
while (($line = fgetcsv($handle, 1000, ';')) !== false) {
    if (count($line) < 3) {
        continue;
    }
    $nom = $line[0];
    $info = (float) $line[1];
    $math = (float) $line[2];
    $moyenne = ($info + $math) / 2;
    $rows[] = [
        'nom' => $nom,
        'notes' => ['info' => $info, 'math' => $math],
        'moyenne' => $moyenne,
    ];
}
fclose($handle);

$jsonPath = __DIR__ . '/Data/notes.json';
file_put_contents($jsonPath, json_encode($rows, JSON_PRETTY_PRINT));

$json = file_get_contents($jsonPath);
$data = json_decode($json, true);

echo '<pre>';
print_r($data);
echo '</pre>';

echo '<p>Le format JSON est directement exploitable par JavaScript.</p>';
echo '<p>serialize() : ' . htmlspecialchars(serialize($rows)) . '</p>';
