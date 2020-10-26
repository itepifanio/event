<?php

namespace App\Repositories;

use App\Models\Attendance;

class AttendanceRepository
{
    public function createOrUpdate(array $data): Attendance
    {
        return  Attendance::upsert(
            ['user_id' => 1, 'event_id' => 1, 'percentage' => 60],
            ['user_id', 'event_id'],
            ['percentage']
        );
    }
}
