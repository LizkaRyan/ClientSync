<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Mockery\Exception;

final class SeuilService
{
    public function findActualSeuil(){
        $response = Http::get('localhost:8080/api/seuil');

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function save($taux){
        $response = Http::get('localhost:8080/api/seuil/save/'.$taux);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }
}
