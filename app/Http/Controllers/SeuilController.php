<?php

namespace App\Http\Controllers;

use App\Service\SeuilService;
use Illuminate\Http\Request;

class SeuilController extends Controller
{

    private SeuilService $seuilService;

    public function __construct(SeuilService $seuilService){
        $this->seuilService = $seuilService;
    }

    public function index(){
        $response=$this->seuilService->findActualSeuil();
        if($response["code"]==200){
            $data["rate"]=$response["data"]["tauxSeuil"];
            return view('seuil.index',$data);
        }
        else{
            dd('Misy erreur',$response);
        }
    }

    public function save(Request $request){
        $request->validate([
            "taux"=>"required|numeric|min:1|max:100",
        ]);
        $response=$this->seuilService->save($request->input("taux"));
        if($response["code"]==200){
            $request->session()->put('admin',true);
            return redirect()->route('seuil.index');
        }
        else{
            dd('Misy erreur',$response);
        }
    }
}
