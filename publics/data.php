<?php
header('Content-Type: application/json');

// Données des ventes
$data = [
    "labels" => ["Jan", "Fév", "Mar", "Avr", "Mai"],
    "datasets" => [[
        "label" => "Ventes",
        "backgroundColor" => "rgba(54, 162, 235, 0.5)",
        "borderColor" => "rgba(54, 162, 235, 1)",
        "borderWidth" => 1,
        "data" => [10, 50, 30, 70, 90]
    ]]
];

// Retourner les données en JSON
echo json_encode($data);
?>