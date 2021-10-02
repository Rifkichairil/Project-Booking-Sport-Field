<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Testing extends Model
{
    // use SoftDeletes;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var array
     */
    protected $keyType = 'bigint';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'testing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'created_at'
    ];
}
