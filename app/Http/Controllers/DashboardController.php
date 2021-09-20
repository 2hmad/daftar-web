<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array();
        if (Session::has('email')) {
            $data = Users::where('email', '=', Session::get('email'))->first();
            $customers = Customers::where('user_email', '=', Session::get('email'))->orderBy('id', 'DESC')->get();
        }
        return view('dashboard', compact('data', 'customers'));
    }

}
