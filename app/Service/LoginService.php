<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Mockery\Exception;

final class LoginService
{
    public function login(string $username,string $password){
        $response = Http::post('localhost:8080/api/login',["username"=>$username,"password"=>$password]);

        // Vérifier la réponse
        if (!$response->successful()) {
            throw new Exception("Erreur du fournisseur d'identite"); // Convertit la réponse JSON en tableau PHP
        }
        return $response->json();
    }
}
