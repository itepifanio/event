<?php

namespace App\Repositories;

use App\Geoevent\Repositories\AttendanceRepository as GeoAttendanceRepository;
use App\Models\Geoevent\Attendance;

class AttendanceRepository extends GeoAttendanceRepository
{
    public function createOrUpdate(array $data): bool
    {
        try {
            Attendance::upsert(
                $data,
                ['user_id', 'event_id'],
                ['percentage']
            );

            return true;
        } catch (\Exception $e){
            return false;
        }
    }
}
