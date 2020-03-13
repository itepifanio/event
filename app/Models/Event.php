<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'image', 'organization_id'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function getDateAttribute(){
        $start_date = Carbon::parse($this->start_date)->format('m/d/Y');
        $end_date = Carbon::parse($this->end_date)->format('m/d/Y');
        return "{$start_date} - {$end_date}";
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
