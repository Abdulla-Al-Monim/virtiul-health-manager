<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public function doctorSpecialities(){
    	return $this->hasMany(DoctorSpeciality::class);
    }
}
