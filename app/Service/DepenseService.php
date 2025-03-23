<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Mockery\Exception;

final class DepenseService
{
    public function findDepenseTicketByCustomerId(int $customerId){
        $response = Http::get('localhost:8080/api/depense/ticket/'.$customerId);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function findDepenseLeadByCustomerId(int $customerId){
        $response = Http::get('localhost:8080/api/depense/lead/'.$customerId);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function findDepenseByCustomerId(int $customerId){
        $response = Http::get('localhost:8080/api/depense/'.$customerId);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }
}
