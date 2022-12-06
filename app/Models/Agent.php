<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Agent
{
    use HasApiTokens, Notifiable;

    protected $table = 'agent'; 
    protected $primaryKey = 'AgentID';
    protected $fillable = [
        'AgentID',
        'AgentName',
        'Race',
        'Gender',
        'RoleID',
        'CountryID',
    ];
    public $timestamps = false;
}
