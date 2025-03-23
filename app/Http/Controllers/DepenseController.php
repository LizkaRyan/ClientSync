<?php

namespace App\Http\Controllers;

use App\Service\DepenseService;

class DepenseController extends Controller
{

    private DepenseService $depenseService;

    public function __construct(DepenseService $depenseService){
        $this->depenseService = $depenseService;
    }

    public function findDepenseTicketDepense(int $customerId){
        $reponse=$this->depenseService->findDepenseTicketByCustomerId($customerId);
        if($reponse["code"]==200){
            $data["depenses"]=$reponse["data"];
            return view('depense.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }

    public function findDepenseLeadDepense(int $customerId){
        $reponse=$this->depenseService->findDepenseLeadByCustomerId($customerId);
        if($reponse["code"]==200){
            $data["depenses"]=$reponse["data"];
            return view('depense.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }

    public function findDepenseByCustomerId(int $customerId){
        $reponse=$this->depenseService->findDepenseByCustomerId($customerId);
        if($reponse["code"]==200){
            $data["depenses"]=$reponse["data"];
            return view('depense.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }

    public function update(int $depenseId){

    }

    public function delete(int $depenseId){

    }
}
