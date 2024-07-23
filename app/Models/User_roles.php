<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_roles extends Model
{
    use HasFactory;

    protected $table = 'user_roles';
    protected $primarykey ='user_role_id';
    protected $fillable = [
        'user_id',
        'role_id'
    ];

    public $timestamps = false;
}
