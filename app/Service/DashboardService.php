<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Mockery\Exception;

final class DashboardService
{
    public function getData(){
        $response = Http::get('localhost:8080/api/dashboard');

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du Java Spring boot"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function findCustomer(){
        $response = Http::get('localhost:8080/api/customer');

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du Java Spring boot"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }
}
