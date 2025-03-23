// Assurez-vous que le DOM est chargé
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('allTicketDepense').getContext('2d');

    // Configuration du graphique
    const myBarChart = new Chart(ctx, {
        type: 'bar', // Type de graphique en bâtons
        data: {
            labels: totalTicketDepense.labels, // Labels pour l'axe X
            datasets: [{
                label: 'All ticket depenses',
                data: totalTicketDepense.data, // Données pour les bâtons
                borderWidth: 1 // Épaisseur des bordures
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
