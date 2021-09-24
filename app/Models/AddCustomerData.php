<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCustomerData extends Model
{
    use HasFactory;

    protected $table = 'customers_data';
    protected $fillable = [
        'customer_id',
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
