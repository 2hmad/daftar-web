<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSupplierData extends Model
{
    use HasFactory;

    protected $table = 'suppliers_data';
    protected $fillable = [
        'supplier_id',
        'user_email',
        'amount',
        'type',
        'name',
        'date',
        'details',
        'pic'
    ];
    protected $hidden = [];
    public $timestamps = false;
}
