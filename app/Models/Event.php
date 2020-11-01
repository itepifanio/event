<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use SoftDeletes, HasFactory;

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
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function getDateAttribute()
    {
        $start_date = Carbon::parse($this->start_date)->format('m/d/Y');
        $end_date = Carbon::parse($this->end_date)->format('m/d/Y');
        return "{$start_date} - {$end_date}";
    }

    public function hasCertificate($user_id)
    {
        foreach($this->attendances as $attendance){
            if($attendance->user_id === $user_id && $attendance->percentage >= 75){
                return true;
            }
        }

        return false;
    }

    public function scopeOfOrganization($query, $id)
    {
        return $query->whereOrganizationId($id);
    }

    /**
     * Use Haversine formula to return
     * closest event in kilometers
     * @param $query
     * @param float $lat
     * @param float $lng
     * @param int $dist
     * @param int $limit
     * @return mixed
     */
    public function scopeClosestTo($query, $lat, $lng, $dist = 30, $limit = 10)
    {
        $haversine = '(6371 * acos(cos(radians(' . $lat .
            ')) * cos(radians(lat)) * cos( radians(lng) - radians(' .
            $lng . ')) + sin(radians(' . $lat .
            ')) * sin(radians(lat)) ))';
        $alias = 'events.name as event_name, addresses.name as address_name';

        return $query->join('addresses', 'events.id', '=', 'addresses.addressable_id')
            ->where('addressable_type', 'App\Models\Event')
            ->selectRaw("*, {$alias}, {$haversine} as distance")
            ->whereRaw("{$haversine} <= ?", $dist)
            ->limit($limit);
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'subscriptions');
    }
}
