<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements MustVerifyEmail
{
    //
    protected $keyType = 'bigint';

    protected $table = 'user';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'telp', 'role_id', 'status', 'account', 'is_email', 'created_at'
    ];

    protected $hidden = [
        'password',
    ];
}
