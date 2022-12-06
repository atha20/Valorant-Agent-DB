<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Ability
{
    use HasApiTokens, Notifiable;

    protected $table = 'abiity'; 
    protected $primaryKey = 'AbilityID';
    protected $fillable = [
        'AbilityID',
        'AbilityName',
        'AbilityType',
        'AgentID',
    ];
    public $timestamps = false;
}
