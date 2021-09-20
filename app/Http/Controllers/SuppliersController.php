<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSupplierRequest;
use App\Models\Suppliers;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class SuppliersController extends Controller
{
    public function index()
    {
        $data = array();
        if (Session::has('email')) {
            $data = Users::where('email', '=', Session::get('email'))->first();
            $suppliers = Suppliers::where('user_email', '=', Session::get('email'))->orderBy('id', 'DESC')->get();
        }
        return view('suppliers', compact('data', 'suppliers'));
    }

    public function store(AddSupplierRequest $request)
    {
        $validated = $request->validated();

        Suppliers::create([
            'user_email' => Session::get('email'),
            'supplier_name' => $request->input('name'),
            'supplier_phone' => $request->input('phone'),
            'created_at' => date('Y-m-d')
        ]);

        return redirect()->route('suppliers')->with('success', '');
    }
}
