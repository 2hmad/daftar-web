<?php

namespace App\Http\Controllers;

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
        }
        return view('dashboard', compact('data'));
    }

    public function suppliers()
    {
        $data = array();
        if (Session::has('email')) {
            $data = Users::where('email', '=', Session::get('email'))->first();
        }
        return view('suppliers', compact('data'));
    }
}
