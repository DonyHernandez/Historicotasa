<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'fecha_tasa',
        'eur',
        'cny',
        'try',
        'rub',
        'usd',
        'operacion_bcv',
    ];


    // protected static function booted()
    // {
    //     static::creating(function ($rate) {
    //         if (ExchangeRate::where('date', $rate->date)->exists()) {
    //             throw new \Exception('La tasa para esta fecha ya existe');
    //         }
    //     });
    // }

}
