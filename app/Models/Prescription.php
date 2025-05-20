<?php

namespace App\Models;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //

     //
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'doctor_id',
        'patientId',
        'at'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
