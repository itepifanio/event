<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'start_date', 'end_date',
        'image', 'organization_id',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function getDateAttribute()
    {
        $start_date = Carbon::parse($this->start_date)->format('m/d/Y');
        $end_date = Carbon::parse($this->end_date)->format('m/d/Y');
        return "{$start_date} - {$end_date}";
    }

    /**
     * Use Haversine formula to return
     * closest event in kilometers
     * @param $query
     * @param float $lat
     * @param float $lng
     * @param int $limit
     * @return mixed
     */
    public function scopeClosestTo($query, $lat, $lng, $limit = 10)
    {
        return $query->join('addresses', 'events.id', '=', 'addresses.addressable_id')
            ->where('addressable_type', 'App\Models\Event')
            ->select(
                DB::raw(
                    '*, (6371 * acos(cos(radians(' . $lat .
                    ')) * cos(radians(lat)) * cos( radians(lng) - radians(' .
                    $lng . ')) + sin(radians(' . $lat .
                    ')) * sin(radians(lat)) )) AS distance'
                )
            )->limit($limit);
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
