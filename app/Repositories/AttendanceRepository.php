<?php

namespace App\Repositories;

use App\Models\Attendance;

class AttendanceRepository
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
