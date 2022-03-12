<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $casts = [
        'attendedDate'=>'date',
    ];

    public function report()
    {
        return  $this->hasOne(Visitreport::class);
    }

    public function scopeDone($query)
    {
        $query->where('visitstate_id',Visitstate::firstWhere('name','done')->id);
    }
}
