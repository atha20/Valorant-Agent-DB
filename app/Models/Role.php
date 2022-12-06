<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role
{
    use HasApiTokens, Notifiable;

    protected $table = 'role'; 
    protected $primaryKey = 'RoleID';
    public $timestamps = false;
}
