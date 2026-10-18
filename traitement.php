<?php
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Cette page attend une soumission POST.';
    exit;
}

if (!isset($_POST['nom'], $_POST['note_info'], $_POST['note_math'])) {
    echo 'Erreur : les champs sont manquants.';
    exit;
}

$nom = trim($_POST['nom']);
$noteInfo = trim($_POST['note_info']);
$noteMath = trim($_POST['note_math']);

if ($nom === '' || $noteInfo === '' || $noteMath === '') {
    echo 'Erreur : tous les champs doivent être remplis.';
    exit;
}

if (!is_numeric($noteInfo) || !is_numeric($noteMath)) {
    echo 'Erreur : les notes doivent être des nombres.';
    exit;
}

$noteInfo = (float) $noteInfo;
$noteMath = (float) $noteMath;
if ($noteInfo < NOTE_MIN || $noteInfo > NOTE_MAX || $noteMath < NOTE_MIN || $noteMath > NOTE_MAX) {
    echo 'Erreur : les notes doivent être comprises entre ' . NOTE_MIN . ' et ' . NOTE_MAX . '.';
    exit;
}

$csvPath = __DIR__ . '/Data/notes.csv';
$handle = fopen($csvPath, 'a');
if ($handle === false) {
    echo 'Erreur : impossible d\'écrire dans le fichier notes.csv.';
    exit;
}

fputcsv($handle, [$nom, $noteInfo, $noteMath], ';');
fclose($handle);

$moyenne = ($noteInfo + $noteMath) / 2;
echo '<h2>Récapitulatif</h2>';
echo '<p>Nom : ' . htmlspecialchars($nom) . '</p>';
echo '<p>Note Info : ' . $noteInfo . '</p>';
echo '<p>Note Math : ' . $noteMath . '</p>';
echo '<p>Moyenne : ' . number_format($moyenne, 2, ',', ' ') . '</p>';
echo '<p>Mention : ' . mention($moyenne) . '</p>';
