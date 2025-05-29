<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{

       protected $fillable = [
        'admin_id',
        'name',
        'female',
        'nationalcode',
        'phone',
        'isactive',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'admin_id');
    }
}
