<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyInfoController extends Controller
{
    public function index()
    {
        $data = Users::where('email', '=', Session::get('email'))->first();
        return view('my-info', compact('data'));
    }
}
