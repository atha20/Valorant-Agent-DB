<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Country
{
    use HasApiTokens, Notifiable;

    protected $table = 'country'; 
    protected $primaryKey = 'CountryID';
    public $timestamps = false;
}
