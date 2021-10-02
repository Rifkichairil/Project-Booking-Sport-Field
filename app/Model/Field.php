<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //
    protected $keyType = "bigint";

    protected $table = "field";

    protected $fillable = [
        'user_id', 'field_name', 'field_code', 'field_category', 'price', 'image', 'created_at','fasilitas', 'field_address', 'no_rek',
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }
    // public function category()
    // {
    //     return $this->belongsTo('App\Model\Category', 'category_id');
    // }
}
