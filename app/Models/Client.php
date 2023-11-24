<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    //protected $dateFormat = 'd-m-Y';

    protected $fillable = [
        'name',
        'surname',
        'address',
        'dni',
        'email',
        'phone',
        'status',
    ];
}
