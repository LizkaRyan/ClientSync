<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Mockery\Exception;

final class DepenseService
{
    public function findDepenseTicketByCustomerId(int $customerId,string $token){
        $response = Http::withHeaders([
            'Authorization' => $token
        ])
        ->get('localhost:8080/api/depense/ticket/'.$customerId);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function findDepenseLead(string $token){
        $response = Http::withHeaders([
            'Authorization' => $token
        ])
        ->get('localhost:8080/api/depense/lead');

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function findDepenseTicket(string $token){
        $response = Http::withHeaders([
            'Authorization' => $token
        ])
        ->get('localhost:8080/api/depense/ticket');

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function findDepenseLeadByCustomerId(int $customerId,string $token){
        $response = Http::withHeaders([
            'Authorization' => $token
        ])
        ->get('localhost:8080/api/depense/lead/'.$customerId);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function findDepenseByCustomerId(int $customerId,string $token){
        $response = Http::withHeaders([
            'Authorization' => $token
        ])
        ->get('localhost:8080/api/depense/'.$customerId);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function update(int $idDepense,float $amount,string $token){
        $response = Http::withHeaders([
            'Authorization' => $token
        ])
        ->get('localhost:8080/api/depense/update/'.$idDepense.'/'.$amount);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }

    public function confirmUpdate($amount,int $idDepense,string $token){
        $response = Http::withHeaders([
            'Authorization' => $token
        ])
        ->get('localhost:8080/api/depense/confirm/update',["amount"=>$amount,"idDepense"=>$idDepense]);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }

        return $response->json();
    }

    public function delete(int $idDepense,string $token){
        $response = Http::withHeaders([
            'Authorization' => $token
        ])
        ->get('localhost:8080/api/depense/delete/'.$idDepense);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }
}
