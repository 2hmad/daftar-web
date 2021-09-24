<?php

namespace App\Http\Controllers;

use App\Models\AddSupplierData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddSupplierDataController extends Controller
{
    public function store_sup_data(Request $request)
    {

        AddSupplierData::create([
            'supplier_id' => $request->input('supplier_id'),
            'user_email' => Session::get('email'),
            'amount' => $request->input('amount'),
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'details' => $request->input('details'),
            'pic' => base64_encode($request->input('file-upload')),
        ]);
        return redirect()->back()->with('success', '');
    }

}
