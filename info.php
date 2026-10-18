<?php
$nom = $_GET['nom'] ?? '';
$prenom = $_GET['prenom'] ?? '';
$sexe = $_GET['sexe'] ?? 'M';

$salutation = ($sexe === 'M') ? 'Bonjour Monsieur' : 'Bonjour Madame';
echo '<h2>' . htmlspecialchars($salutation) . ' ' . htmlspecialchars($prenom) . ' ' . htmlspecialchars($nom) . '</h2>';
