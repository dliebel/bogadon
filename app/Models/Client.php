<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table="client"; //clients


    protected $fillable=[

        'first_name',
        'last_name',
        'address',
        'phone',
    ];

    public static $rulesCreate=[
        'first_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'phone' => 'required',
    ];

    public static $rulesUpdate=[
        'first_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'phone' => 'required',
    ];

    



}
