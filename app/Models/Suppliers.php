<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = [
        'id',
        'user_email',
        'supplier_name',
        'supplier_phone',
        'created_at'
    ];
    protected $hidden = [];
    public $timestamps = false;

}
