<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class RegisterUsers extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        Users::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'store_name' => $request->input('store_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->route('register')->with('success', '');
    }

}
