<?php

namespace App\Http\Controllers;

use App\Service\DepenseService;
use Illuminate\Http\Request;

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

    public function findDepenseTicket(){
        $reponse=$this->depenseService->findDepenseTicket();
        if($reponse["code"]==200){
            $data["depenses"]=$reponse["data"];
            return view('depense.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }

    public function findDepenseLead(){
        $reponse=$this->depenseService->findDepenseLead();
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

    public function updateForm(int $depenseId,float $amount,Request $request){
        $request->session()->put('depenseId',$depenseId);
        $data["amount"]=$amount;
        return view('depense.form-update',$data);
    }

    public function update(Request $request){
        $request->validate([
            'amount'=>'required|numeric|min:1',
        ]);
        $idDepense=$request->session()->get('depenseId');
        $this->depenseService->update($idDepense,$request->input("amount"));
        return redirect('/dashboard');
    }

    public function delete(int $depenseId){
        $this->depenseService->delete($depenseId);
        return redirect('/dashboard');
    }
}
