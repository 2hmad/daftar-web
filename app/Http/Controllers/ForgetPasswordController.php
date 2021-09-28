<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        return view('forget-password');
    }

    public function message(Request $request)
    {
        $rules = $request->validate([
            'email' => 'required'
        ],
            [
                'email.required' => __('messages.email-required')
            ]);

        $user = DB::table('users')->where('email', '=', $request->input('email'))->first();

        if ($user === null) {
            return redirect('forget-password')->with('error', __('messages.email-not-found'));
        } else {
            $check = DB::table('reset_password')->where('email', '=', $request->input('email'))->first();
            if ($check !== null) {
                $update = DB::table('reset_password')
                    ->where('email', '=', $request->input('email'))
                    ->limit(1)
                    ->update(
                        array(
                            'token' => Str::random(25),
                            'date' => date('Y-m-d'),
                            'time' => date('h:m a')
                        )
                    );
                return redirect('forget-password')->with('success', __('messages.link-send'));
            } else {
                $insert = DB::insert('insert into reset_password (email, token, date, time) values (?, ?, ?, ?)', [
                    $request->input('email'),
                    Str::random(25),
                    date('Y-m-d'),
                    date('h:m a')
                ]);
                return redirect('forget-password')->with('success', __('messages.link-send'));
            }
        }
    }

    public function reset(Request $request, $email, $token)
    {
        if (!is_null($request->route('token'))) {
            $check = DB::table('reset_password')->where([
                ['email', '=', $email],
                ['token', '=', $token],
                ['date', '=', date('Y-m-d')],
                ['time', '>=', date('h:m a')]
            ])->first();
            if ($check) {
                return view('reset-password')->with("email", $email)->with("token", $token);

            } else {
                return redirect('token-expired');
            }
        } else {
            return redirect('forget-password');
        }
    }

    public function ChangePassword(Request $request, $email, $token)
    {
        $rules = $request->validate([
            'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required',
        ], [
            'password.required' => __('messages.password-required'),
            'password.min:6' => __('messages.password-short'),
            'confirm_password.required' => __('messages.password-required'),
            'password.same:confirm_password' => __('messages.password-match')
        ]);

        $update = DB::table('users')
            ->where('email', '=', $email)
            ->update(
                array(
                    'password' => Hash::make($request->input('password')),
                )
            );
        if ($update) {
            DB::table('reset_password')
                ->where('email', '=', $email)
                ->where('token', '=', $token)
                ->delete();
            return redirect('password-changed');
        }
    }
}
