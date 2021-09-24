<?php

namespace App\Http\Controllers;

use App\Models\AddCustomerData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddCustomerDataController extends Controller
{
    public function store_cus_data(Request $request)
    {

        $file = $request->file('file-upload');
        $path = '';
        if ($file) {
            $filename = Session::get('email') . '-' . $request->input('customer_id') . '-' . 'customers' . '-' . $request->input('name') . '-' . rand(0, 99999999) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/uploads', $filename);
        }

        AddCustomerData::create([
            'customer_id' => $request->input('customer_id'),
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
