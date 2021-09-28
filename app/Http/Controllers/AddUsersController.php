<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReleatedUsersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

    public function store(ReleatedUsersRequest $request)
    {
        $validated = $request->validated();
        $insert = DB::table('releated_users')->insert([
            'releated_user' => Session::get('email'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'confirm' => '0'
        ]);
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $insert = DB::table('releated_users')
            ->where('id', '=', $id)
            ->where('releated_user', '=', Session::get('email'))
            ->delete();
        return redirect()->back();
    }
}
