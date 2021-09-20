<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoginUsers extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = Users::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('email', $user->email);
                return redirect()->to('dashboard')->withSuccess('Logged-in');
            } else {
                return redirect('login')->with('fail-password', __('messages.password-incorrect'));
            }
        } else {
            return redirect('login')->with('fail-email', __('messages.email-incorrect'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/login');
    }
}
