<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primarykey ='role_id';
    protected $fillable = [
        'role_name'
    ];

    public $timestamps = false;
}
