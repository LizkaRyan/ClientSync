<?php

namespace App\Http\Controllers;

use App\Dto\Chart;
use App\Service\DashboardService;

class DashboardController extends Controller
{
    private DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(){
        $reponse=$this->dashboardService->getData();
        if($reponse["code"]==200){
            $totalDepense=Chart::transformIntoDataChart($reponse["data"]["totalDepense"]);
            $totalTicketDepense=Chart::transformIntoDataChart($reponse["data"]["totalTicketDepense"]);
            $totalLeadDepense=Chart::transformIntoDataChart($reponse["data"]["totalLeadDepense"]);
            $data["statistique"]["totalTicketDepense"]=$totalTicketDepense;
            $data["statistique"]["totalLeadDepense"]=$totalLeadDepense;
            $data["statistique"]["totalDepense"]=$totalDepense;
            return view('dashboard.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }
}
