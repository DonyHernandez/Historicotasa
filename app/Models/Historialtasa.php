<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Historialtasa extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'eur',
        'cny',
        'try',
        'rub',
        'usd',
        'fechaope',
        'fechaval1',
        'fechaval2',
    ];






}
