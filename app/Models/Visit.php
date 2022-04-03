<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['practitioner_id','employee_id','attendedDate','visitstate_id'];

    protected $casts = [
        'attendedDate'=>'datetime',
    ];

    public function report()
    {
        return  $this->hasOne(Visitreport::class);
    }

    public function practitioners()
    {
        return $this->belongsTo(Practitioner::class, 'practitioner_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function scopeDone($query)
    {
        $query->where('visitstate_id',Visitstate::firstWhere('name','done')->id);
    }

    public function visitsReport()
    {
            return $this->hasMany(Visitreport::class);
    }
}
