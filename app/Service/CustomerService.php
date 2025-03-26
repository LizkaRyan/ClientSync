<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

final class CustomerService
{
    public function duplicate($token){
        $response = Http::asMultipart()
            ->withHeader("Authorization",$token)
            ->attach('expense', Storage::get("temp/csvExpense.csv"), 'csvExpense.csv')
            ->attach('budget', Storage::get("temp/csvBudget.csv"), 'csvBudget.csv')
            ->attach('customer', Storage::get("temp/csvCustomer.csv"), 'csvCustomer.csv')
            ->post('http://localhost:8080/api/customer/upload-multiple');
        
        dd($response->body());
        
        if ($response->successful()) {
            return 'Fichiers envoyés avec succès !';
        }

        return 'Échec de l\'envoi des fichiers.';
    }

    public function createExpenseCSV($customer){
        $csv="customer_email,subject_or_name,type,status,expense\n";
        foreach($customer["expenses"] as $expense){
            if($expense["lead"]!=null){
                $csv=$csv.$customer["email"].",".$expense["lead"]["name"].",lead,".$expense["lead"]["status"].",".$expense["amount"]."\n";
            }
            if($expense["ticket"]!=null){
                $csv=$csv.$customer["email"].",".$expense["ticket"]["subject"].",ticket,".$expense["ticket"]["status"].",".$expense["amount"]."\n";
            }
        }
        return $csv;
    }

    public function createBudgetCsv($customer){
        $csv="customer_email,Budget\n";
        foreach($customer["budgets"] as $budgets){
            $csv=$csv.$customer["email"].",".$budgets["budget"]."\n";
        }
        return $csv;
    }

    public function createCustomerCsv($customer){
        $csv="customer_email,customer_name\n";
        $csv=$csv.$customer["email"].",".$customer["name"];
        return $csv;
    }

    public function cloneCustomer($customer){
        $customer["name"]="Copy_".$customer["name"];
        $customer["email"]="Copy_".$customer["email"];
        return $customer;
    }
}
