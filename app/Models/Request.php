<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'female',
        'grade',
        'nationalcode',
        'story',
        'phone',
        'isactive',
        'date',
        'imgpath'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
