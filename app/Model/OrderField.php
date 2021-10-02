<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderField extends Model
{
    //
    protected $keyType = "bigint";

    protected $table = "order_field";

    protected $fillable = [
        'user_id', 'owner_id', 'field_id', 'no_rek', 'unique_code', 'field_name', 'field_category', 'field_code', 'field_date', 'expired_order', 'time_start', 'time_end', 'price', 'total', 'status', 'created_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Model\Field', 'owner_id');
    }

    public function field()
    {
        return $this->belongsTo('App\Model\Field', 'field_id');
    }

    public function payment()
    {
        return $this->hasOne('App\Model\Payment', 'order_field_id');
    }

    public function paymentUser()
    {
        return $this->belongsTo('App\Model\Payment', 'user_id');
    }
}
