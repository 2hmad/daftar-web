<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class SuppliersController extends Controller
{
    public function index()
    {
        $data = array();
        if (Session::has('email')) {
            $data = Users::where('email', '=', Session::get('email'))->first();
            $suppliers = Suppliers::where('user_email', '=', Session::get('email'))->get();
        }
        return view('suppliers', compact('data', 'suppliers'));
    }
}
