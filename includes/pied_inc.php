
<footer>
    <hr>
    <p>Fin de page - <?= ETABLISSEMENT; ?></p>
    
    <?php
    // 1. Date du jour
    echo "<p>Date du jour : " . date('d/m/Y') . "</p>";

    // 2. Différence de dates (fin de semestre par ex)
    $dateFin = new DateTime('2027-01-15');
    $aujourdhui = new DateTime();
    $diff = $aujourdhui->diff($dateFin);
    echo "<p>Jours restants avant la fin du semestre : " . $diff->days . " jours.</p>";

    // 3. checkdate()
    $mois = 2; $jour = 30; $annee = 2024;
    if (checkdate($mois, $jour, $annee)) {
        echo "<p>La date $jour/$mois/$annee est valide.</p>";
    } else {
        echo "<p>La date $jour/$mois/$annee est INVALIDE (février n'a pas 30 jours).</p>";
    }
    ?>
</footer>
</body>
</html>   
