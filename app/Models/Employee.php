<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function sectordistrict()
    {
        return $this->belongsTo(Sectordistrict::class);
    }

    /**
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    **/
    public function scopeActive(Builder $query,$date=null)
    {
        $date = $date ?? Carbon::now();
        $query->where('entryDate','>=',$date->format('Y-m-d'))
              ->orWhere(function($query) use ($date) {
                  $query->where('releaseDate','<=',$date->format('Y-m-d'))
                        ->orWhere('releaseDate',null);
              });
    }
}
