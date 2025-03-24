<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lead\Budget;
use App\Models\Lead\Contract;
use App\Models\Lead\Depense;
use App\Models\Lead\Lead;
use App\Models\Lead\Ticket;
use App\Models\User\Customer;
use App\Models\User\CustomerLoginInfo;
use App\Models\User\UserProfile;
use App\Models\User\Users;
use Database\Factories\User\UserProfileFactory;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        // Utilisation correcte de la factory pour créer 10 utilisateurs
        $users = Users::factory()->count(10)->make();

        $list = [];
        foreach ($users as $user) {
            $list[] = $user->getInsertString();
        }

        $userProfiles = UserProfile::factory()->withUserLength(count($users))->count(10)->make();

        foreach ($userProfiles as $user) {
            $list[] = $user->getInsertString();
        }

        $customersLogin = CustomerLoginInfo::factory()->count(10)->make();

        foreach ($customersLogin as $user) {
            $list[] = $user->getInsertString();
        }

        $customers = Customer::factory()->withParameter(count($customersLogin),count($users))->count(10)->make();

        foreach ($customers as $user) {
            $list[] = $user->getInsertString();
        }

        $tickets = Ticket::factory()->withParameter(count($customers),count($users))->count(10)->make();

        foreach ($tickets as $user) {
            $list[] = $user->getInsertString();
        }

        $leads = Lead::factory()->withParameter(count($customers),count($users))->count(10)->make();

        foreach ($leads as $user) {
            $list[] = $user->getInsertString();
        }

        $contracts = Contract::factory()->withParameter(count($leads),count($users),count($customers))->count(10)->make();

        foreach ($contracts as $user) {
            $list[] = $user->getInsertString();
        }

        $budgets = Budget::factory()->withParameter(count($customers))->count(15)->make();

        foreach ($budgets as $user) {
            $list[] = $user->getInsertString();
        }

        $depense = Depense::factory()->withParameter(count($tickets),count($budgets),count($leads))->count(20)->make();

        foreach ($depense as $user) {
            $list[] = $user->getInsertString();
        }
        return $list;
    }
}
