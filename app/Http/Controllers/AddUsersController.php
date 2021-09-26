<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AddUsersController extends Controller
{
    public function index()
    {
        $table = DB::table('releated_users')
        ->where('releated_user', '=', Session::get('email'))
        ->get();
        return view('add-users', compact('table'));
    }
    public function store() {

    }
}
