<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MyInfoController extends Controller
{
    public function index()
    {
        $data = Users::where('email', '=', Session::get('email'))->first();
        return view('my-info', compact('data'));
    }
    public function update(Request $request) {
        DB::table('users')
        ->where('email', '=', Session::get('email'))
        ->limit(1)
        ->update(
            array("first_name" => $request->input('first_name'),
            "last_name" => $request->input('last_name'),
            "phone" => $request->input('phone'))
        );
        return redirect()->to('my-info')->with('success', '');
    }
}
