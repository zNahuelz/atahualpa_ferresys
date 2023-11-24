<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    //protected $dateFormat = 'd-m-Y';

    protected $fillable = [
        'name',
        'ruc',
        'address',
        'phone',
        'email',
        'description',
        'status',
    ];
}
