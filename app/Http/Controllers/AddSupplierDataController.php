<?php

namespace App\Http\Controllers;

use App\Models\AddSupplierData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddSupplierDataController extends Controller
{
    public function store_sup_data(Request $request)
    {

        $file = $request->file('file-upload');
        $path = '';
        if ($file) {
            $filename = Session::get('email') . '-' . $request->input('supplier_id') . '-' . 'suppliers' . '-' . $request->input('name') . '-' . rand(0, 99999999) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename);
        }

        AddSupplierData::create([
            'supplier_id' => $request->input('supplier_id'),
            'user_email' => Session::get('email'),
            'amount' => $request->input('amount'),
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'details' => $request->input('details'),
            'pic' => $path,
        ]);
        return redirect()->back()->with('success', '');
    }

}
