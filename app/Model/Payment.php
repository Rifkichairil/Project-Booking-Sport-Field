<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $keyType = "bigint";

    protected $table = "payment";

    protected $fillable = [
        'order_field_id', 'owner_id', 'user_id', 'image', 'created_at'
    ];

    public function order_field()
    {
        return $this->belongsTo('App\Model\OrderField',  'order_field_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Model\Field', 'owner_id');
    }
}
