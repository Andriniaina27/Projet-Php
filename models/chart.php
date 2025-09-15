<?php
    require 'connexion.php';

    $stmt = $db->query("SELECT MONTH(date_creation) as mois, COUNT(*) as total 
                    FROM annonces 
                    WHERE YEAR(date_creation) = YEAR(CURDATE()) 
                    GROUP BY mois
    ");

    $mois = [];
    $totaux = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $mois[] = $row['mois'];
        $totaux[] = $row['total'];
    }

    // On prépare les données pour Chart.js
    $data_mois = json_encode($mois);
    $data_totaux = json_encode($totaux);

?>