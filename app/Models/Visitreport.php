<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitreport extends Model
{
    use HasFactory;

    public function medecines()
    {
        return $this->hasMany(Medecine::class);
    }

    public function visits(){
        $this->belongsTo(Visit::class,'visit_id');
    }
}
