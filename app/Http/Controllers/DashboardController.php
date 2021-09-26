<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array();
        if (Session::has('email')) {
            $data = Users::where('email', '=', Session::get('email'))->first();
            $customers = Customers::where('user_email', '=', Session::get('email'))->orderBy('id', 'DESC')->get();
            $count_got = DB::table('customers_data')
                        ->where('user_email', '=', Session::get('email'))
                        ->where('type', '=', 'got')
                        ->get()
                        ->sum('amount');
            $count_gave = DB::table('customers_data')
                        ->where('user_email', '=', Session::get('email'))
                        ->where('type', '=', 'gave')
                        ->get()
                        ->sum('amount');
        }
        return view('dashboard', compact('data', 'customers', 'count_got', 'count_gave'));
    }

}
