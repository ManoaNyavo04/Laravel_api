<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Utilisateur extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'utilisateur';
    protected $primaryKey ='user_id';
    protected $fillable = [
        'username',
        'email',
    ];

    public $timestamps = false;
    public $incrementing = false;
}
