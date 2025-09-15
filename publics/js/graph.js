 // Charger les données depuis PHP
 fetch("../../models/chart.php")
 .then(response => response.json())
 .then(data => {
     let ctx = document.getElementById('graphCanvas').getContext('2d');
     new Chart(ctx, {
         type: 'bar', // Type d'histogramme
         data: data,
         options: {
             responsive: true,
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 });
window.location.href = '../../view/client/index.php';