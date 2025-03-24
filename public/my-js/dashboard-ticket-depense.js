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
                borderWidth: 1, // Épaisseur des bordures
                backgroundColor: 'rgba(54, 162, 235, 1)', // Rouge avec transparence
                borderColor: 'rgba(54, 162, 235, 1)', // Bordure , // Rouge opaque pour les bordures
                customerId: totalTicketDepense.customerId
            }],
        },
        options: {
            indexAxis: 'y', // Rend les barres horizontales
            responsive: true,
            scales: {
                x: { beginAtZero: true }, // Axe X commence à 0
                y: { beginAtZero: false } // Axe Y automatique
            },
            plugins: {
                legend: { position: 'top' }
            },
            onClick: (event, elements) => {
                // Vérifie si un élément a été cliqué
                if (elements.length > 0) {
                    const elementIndex = elements[0].index; // Récupère l'index du bâton cliqué
                    const datasetIndex = elements[0].datasetIndex; // Récupère l'index du dataset

                    const customerId = myBarChart.data.datasets[datasetIndex].customerId[elementIndex];

                    window.location.href = `http://127.0.0.1:8000/depense/ticket/`+customerId;
                }
            }
        }
    });
});
