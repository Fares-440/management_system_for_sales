<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'username',
        'password',
        'added_by',
        'added_by',
        'updated_by',
        'updated_by',
        'com_code',
    ];


}
