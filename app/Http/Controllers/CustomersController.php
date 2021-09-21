<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCustomerRequest;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
{
    public function store(AddCustomerRequest $request)
    {
        $validated = $request->validated();

        Customers::create([
            'user_email' => Session::get('email'),
            'customer_name' => $request->input('name'),
            'customer_phone' => $request->input('phone'),
            'created_at' => date('Y-m-d')
        ]);

        return redirect()->route('dashboard')->with('success', '');
    }

    public function fetch($id)
    {
        return view('customer');
    }
}
