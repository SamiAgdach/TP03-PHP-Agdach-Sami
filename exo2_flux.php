<?php
require __DIR__ . '/config.php';

function afficherTriangle($hauteur) {
    for ($i = 1; $i <= $hauteur; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo '*';
        }
        echo '<br>';
    }
}

function afficherPairsJusqua10() {
    for ($i = 0; $i <= 10; $i++) {
        if ($i % 2 !== 0) {
            continue;
        }
        echo $i . ' ';
    }
    echo '<br>';
}

echo '<h2>Exercice 2.1 : mention()</h2>';
foreach ([8, 10, 12, 14, 16, 18] as $note) {
    echo $note . ' => ' . mention($note) . '<br>';
}

echo '<h2>Exercice 2.2 : switch sur le mois</h2>';
$mois = (int) date('m');
switch ($mois) {
    case 1:
        $libelle = 'Janvier';
        break;
    case 2:
        $libelle = 'Février';
        break;
    case 3:
        $libelle = 'Mars';
        break;
    case 4:
        $libelle = 'Avril';
        break;
    case 5:
        $libelle = 'Mai';
        break;
    case 6:
        $libelle = 'Juin';
        break;
    case 7:
        $libelle = 'Juillet';
        break;
    case 8:
        $libelle = 'Août';
        break;
    case 9:
        $libelle = 'Septembre';
        break;
    case 10:
        $libelle = 'Octobre';
        break;
    case 11:
        $libelle = 'Novembre';
        break;
    case 12:
        $libelle = 'Décembre';
        break;
    default:
        $libelle = 'Mois inconnu';
}
echo 'Le mois courant est : ' . $libelle . '<br>';
// Si on oublie break, le code continue dans les cases suivantes jusqu'au prochain break.

echo '<h2>Exercice 2.3 : boucles</h2>';

echo '<h3>Triangle</h3>';
afficherTriangle(6);

echo '<h3>While de 0 à 20 par 2</h3>';
$i = 0;
while ($i <= 20) {
    if ($i === 10) {
        echo '<strong>10</strong> ';
    } else {
        echo $i . ' ';
    }
    $i += 2;
}

echo '<br><h3>For avec continue</h3>';
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 !== 0) {
        continue;
    }
    echo $i . ' ';
}

echo '<br><h3>Break 2</h3>';
for ($i = 1; $i <= 12; $i++) {
    switch ($i) {
        case 5:
            echo 'At 5<br>';
            break 2;
        case 10:
            echo 'At 10; quitting<br>';
            break 2;
        default:
            echo 'i=' . $i . '<br>';
    }
}

echo '<h3>Do while</h3>';
$k = 1;
do {
    echo $k . ' ';
    $k++;
} while ($k <= 5);
