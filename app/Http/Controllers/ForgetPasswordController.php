<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $rules = [
            'email' => 'required'
        ];
        $user = DB::table('users')->where('email', '=', $request->input('email'))->first();

        if ($user === null) {
            return redirect('forget-password')->with('error', __('message.email-not-found'));
        } else {
            $check = DB::table('reset_password')->where('email', '=', $request->input('email'))->first();
            if ($check !== null) {
                $validator = Validator::make($request->all(), $rules);
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
                $validator = Validator::make($request->all(), $rules);
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
}
