// Assurez-vous que le DOM est chargé

document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('sumDepenseBudget').getContext('2d');

    // Configuration du graphique
    const myBarChart = new Chart(ctx, {
        type: 'bar', // Type de graphique en bâtons
        data: {
            labels: sumDepenseBudget.labels, // Labels pour l'axe X
            datasets: [{
                label: 'Budget vs Depense',
                data: sumDepenseBudget.data,
                borderWidth: 1, // Épaisseur des bordures
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)', // Couleur segment A
                    'rgba(54, 162, 235, 0.7)', // Couleur segment B
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', // Bordure segment A
                    'rgba(54, 162, 235, 1)', // Bordure segment B
                ],
            }]
        },
    });
});
