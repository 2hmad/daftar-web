<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = [
        'id',
        'user_email',
        'customer_name',
        'customer_phone',
        'created_at'
    ];
    protected $hidden = [];
    public $timestamps = false;
}
