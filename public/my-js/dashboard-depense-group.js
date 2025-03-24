// Assurez-vous que le DOM est chargé
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('sumDepense').getContext('2d');

    // Configuration du graphique
    const myPieChart = new Chart(ctx, {
        type: 'pie', // Type de graphique en bâtons
        data: {
            labels: sumDepense.labels, // Labels pour l'axe X
            datasets: [{
                label: 'Sum Depense group',
                data: sumDepense.data, // Données pour les bâtons
                borderWidth: 1, // Épaisseur des bordures
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)', // Couleur segment A
                    'rgba(54, 162, 235, 0.7)', // Couleur segment B
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', // Bordure segment A
                    'rgba(54, 162, 235, 1)', // Bordure segment B
                ],
                customerId: totalDepense.customerId
            }]
        },
        options: {
            responsive: true, // Rend le graphique responsive
            scales: {
                y: {
                    beginAtZero: true // Commence l'axe Y à 0
                }
            }
        }
    });
});
