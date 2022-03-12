<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practitioner extends Model
{
    use HasFactory;

    public function visits()
    {
        return $this->hasMany(Visit::class)->orderBy('attentedDate','DESC');
    }

    public function sectordistrict()
    {
        return $this->belongsTo(Sectordistrict::class);
    }
}
