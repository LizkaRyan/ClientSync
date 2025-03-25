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

    public function findDepenseTicketDepense(int $customerId,Request $request){
        $reponse=$this->depenseService->findDepenseTicketByCustomerId($customerId,$request->session()->get('token'));
        if($reponse["code"]==200){
            $data["depenses"]=$reponse["data"];
            return view('depense.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }

    public function findDepenseTicket(Request $request){
        $reponse=$this->depenseService->findDepenseTicket($request->session()->get('token'));
        if($reponse["code"]==200){
            $data["depenses"]=$reponse["data"];
            return view('depense.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }

    public function findDepenseLead(Request $request){
        $reponse=$this->depenseService->findDepenseLead($request->session()->get('token'));
        if($reponse["code"]==200){
            $data["depenses"]=$reponse["data"];
            return view('depense.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }

    public function findDepenseLeadDepense(int $customerId,Request $request){
        $reponse=$this->depenseService->findDepenseLeadByCustomerId($customerId,$request->session()->get('token'));
        if($reponse["code"]==200){
            $data["depenses"]=$reponse["data"];
            return view('depense.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }

    public function findDepenseByCustomerId(int $customerId,Request $request){
        $reponse=$this->depenseService->findDepenseByCustomerId($customerId,$request->session()->get('token'));
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
        $amount=$request->input('amount');
        $response=$this->depenseService->update($idDepense,$amount,$request->session()->get('token'));
        if($response["code"]==200){
            return redirect('/dashboard');
        }
        else{
            $request->session()->put('amount',$amount);
            return view('depense/alert');
        }
    }

    public function confirmUpdate(Request $request){
        $response=$this->depenseService->confirmUpdate($request->session()->get('amount'),$request->session()->get('depenseId'),$request->session()->get('token'));
        return redirect('/dashboard');
    }

    public function rejectUpdate(Request $request){
        $request->session()->put("amount",null);
        $request->session()->put("depenseId",null);
        return redirect('/dashboard');
    }

    public function delete(int $depenseId,Request $request){
        $this->depenseService->delete($depenseId,$request->session()->get('token'));
        return redirect('/dashboard');
    }
}
