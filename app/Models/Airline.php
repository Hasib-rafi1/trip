<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $table = 'airlines';
    public $timestamps = true;



    protected $fillable = [
        'code',
        'name',
        'created_at'
    ];
}
