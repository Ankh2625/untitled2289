<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarta extends Model
{
    use HasFactory;

    protected $table = 'quartas';

    public $timestamps = false;

    protected $fillable = [
        'quarta_id',
        'available',
        'url',
        'price',
        'oldprice',
        'currencyid',
        'category',
        'sub_category',
        'sub_sub_category',
        'picture',
        'name',
        'vendor',
    ];

}
