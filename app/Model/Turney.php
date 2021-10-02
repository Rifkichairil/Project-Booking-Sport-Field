<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turney extends Model
{
    //
    use SoftDeletes;

    protected $keyType = 'bigint';

    protected $table = 'turney';

    protected $fillable = [
        'image', 'turney_name', 'turney_desc', 'turney_address', 'turney_open_req', 'turney_fee', 'created_at', 'turney_link',
    ];
}
