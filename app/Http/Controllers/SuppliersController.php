<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSupplierRequest;
use App\Models\AddSupplierData;
use App\Models\Suppliers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SuppliersController extends Controller
{
    public function index()
    {
        $data = array();
        if (Session::has('email')) {
            $data = Users::where('email', '=', Session::get('email'))->first();
            $suppliers = Suppliers::where('user_email', '=', Session::get('email'))->orderBy('id', 'DESC')->get();
            $got = DB::table('suppliers_data')
                ->where('user_email', '=', Session::get('email'))
                ->where('type', '=', 'got')
                ->get()
                ->sum('amount');
            $gave = DB::table('suppliers_data')
                ->where('user_email', '=', Session::get('email'))
                ->where('type', '=', 'gave')
                ->get()
                ->sum('amount');
        }
        return view('suppliers', compact('data', 'suppliers', 'got', 'gave'));
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

    public function fetch($id)
    {
        if (Session::has('email')) {
            $gots = DB::table('suppliers_data')
                ->where('user_email', '=', Session::get('email'))
                ->where('supplier_id', '=', $id)
                ->get();
            $gaves = DB::table('suppliers_data')
                ->where('user_email', '=', Session::get('email'))
                ->where('type', '=', 'gave')
                ->get();
        }
        return view('supplier', compact('gots', 'gaves'));
    }

}
