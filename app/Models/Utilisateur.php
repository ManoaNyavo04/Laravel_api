<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateur';
    protected $primaryKey ='user_id';
    protected $fillable = [
        'username',
        'email',
    ];

    public $timestamps = false;
}
