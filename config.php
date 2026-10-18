<?php
const ETABLISSEMENT = "Institut de l'Innovation";
define('NOTE_MIN', 0);
define('NOTE_MAX', 20);
define('SEUIL', 10);

function mention($note) {
    if ($note >= 16) {
        return 'Très bien';
    }
    if ($note >= 14) {
        return 'Bien';
    }
    if ($note >= 12) {
        return 'Assez bien';
    }
    if ($note >= SEUIL) {
        return 'Passable';
    }
    return 'Ajourné';
}
?>