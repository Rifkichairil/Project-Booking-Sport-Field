<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $keyType = "bigint";

    protected $table = "category";

    protected $fillable = [
        'name', 'created_at'
    ];
}
