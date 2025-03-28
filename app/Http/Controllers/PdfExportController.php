<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfExportController extends Controller
{
    public function generatePdf()
    {
        // Données à inclure dans le PDF
        $data = [
            'title' => 'Exemple de Titre',
            'content' => 'Ceci est le contenu du PDF généré avec Laravel DomPDF.',
        ];

        // Charger la vue et passer les données
        $pdf = Pdf::loadView('pdf_template', $data);

        // Télécharger le fichier PDF
        return $pdf->download('example.pdf');
    }
}
