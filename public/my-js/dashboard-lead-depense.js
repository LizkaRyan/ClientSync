// Assurez-vous que le DOM est chargé

document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('allLeadDepense').getContext('2d');

    // Configuration du graphique
    const myBarChart = new Chart(ctx, {
        type: 'bar', // Type de graphique en bâtons
        data: {
            labels: totalLeadDepense.labels, // Labels pour l'axe X
            datasets: [{
                label: 'All lead depense',
                data: totalLeadDepense.data,
                borderWidth: 1, // Épaisseur des bordures
                backgroundColor: 'rgba(255, 0, 0, 0.5)', // Rouge avec transparence
                borderColor: 'rgba(255, 0, 0, 1)', // Rouge opaque pour les bordures
                customerId: totalLeadDepense.customerId
            }]
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

                    window.location.href = `http://127.0.0.1:8000/depense/lead/`+customerId;
                }
            }
        }
    });
});
