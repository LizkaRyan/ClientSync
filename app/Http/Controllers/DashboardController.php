<?php

namespace App\Http\Controllers;

use App\Dto\Chart;
use App\Service\CustomerService;
use App\Service\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    private DashboardService $dashboardService;

    private CustomerService $customerService;

    public function __construct(DashboardService $dashboardService,CustomerService $customerService)
    {
        $this->dashboardService = $dashboardService;
        $this->customerService = $customerService;
    }

    public function uploadForm(){
        return view('customer/upload-form');
    }

    public function upload(Request $request){
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file',
        ]);

        // Check if the file is valid
        if ($request->file('file')->isValid()) {
            // Store the file in the 'uploads' directory on the 'public' disk
            $fileContent = $request->file('file')->getContent();
            $customer = json_decode($fileContent,true);
            $customer=$this->customerService->cloneCustomer($customer);
            $csvExpense=$this->customerService->createExpenseCsv($customer);
            $csvBudget=$this->customerService->createBudgetCsv($customer);
            $csvCustomer=$this->customerService->createCustomerCsv($customer);

            Storage::put("temp/csvExpense.csv", $csvExpense);
            Storage::put("temp/csvBudget.csv", $csvBudget);
            Storage::put("temp/csvCustomer.csv", $csvCustomer);

            $this->customerService->duplicate($request->session()->get('token'));
            // Return success response
            return back()->with('success', 'File uploaded successfully');
        }
        // Return error response
        return back()->with('error', 'File upload failed');

    }

    public function index(Request $request){
        $reponse=$this->dashboardService->getData($request->session()->get('token'));
        if($reponse["code"]==200){
            $totalDepense=Chart::transformIntoDataChart($reponse["data"]["totalDepense"]);
            $totalTicketDepense=Chart::transformIntoDataChart($reponse["data"]["totalTicketDepense"]);
            $totalLeadDepense=Chart::transformIntoDataChart($reponse["data"]["totalLeadDepense"]);
            $sumDepense=Chart::transformIntoDataChartSum($reponse["data"]["depenseSumGroupBy"]);
            $sumDepenseBudget=Chart::transformIntoDataChartSum($reponse["data"]["sumDepenseBudget"]);
            $data["statistique"]["totalTicketDepense"]=$totalTicketDepense;
            $data["statistique"]["totalLeadDepense"]=$totalLeadDepense;
            $data["statistique"]["totalDepense"]=$totalDepense;
            $data["statistique"]["sumDepense"]=$sumDepense;
            $data["statistique"]["sumDepenseBudget"]=$sumDepenseBudget;
            $data["countTicket"]=$reponse["data"]["countTicket"];
            $data["countCustomer"]=$reponse["data"]["countCustomer"];
            $data["countLead"]=$reponse["data"]["countLead"];
            return view('dashboard.index',$data);
        }
        else{
            dd('Misy erreur lty a!',$reponse);
        }
    }

    public function findCustomer(Request $request){
        $reponse=$this->dashboardService->findCustomer($request->session()->get('token'));
        if($reponse["code"]==200){
            $data["customers"]=$reponse["data"];
            return view('customer.index',$data);
        }
        else{
            dd("Misy erreur izy zany",$reponse);
        }
    }
}
