<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practitioner extends Model
{
    use HasFactory;

    protected $fillable = ['lastname','firstname','complementarySpeciality','address','email','website','meeting_online','tel','status'];
    //protected $fillable = ['lastName','firstName','address','tel','notorietyCoeff','complementarySpeciality','sectordistrict_id','drivingLicense','company_id'];

    public function visits()
    {
        return $this->hasMany(Visit::class)->orderBy('attendedDate','DESC');
    }

    public function sectordistrict()
    {
        return $this->belongsTo(Sectordistrict::class);
    }
}
