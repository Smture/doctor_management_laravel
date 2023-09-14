<?php

namespace App\Repositories\MySql\TimeSlot;

use App\Models\TimeSlot;
use App\Repositories\MySql\MySqlBaseRepository;
use  App\Repositories\TimeSlot\TimeSlotRepository;

class TimeSlotRepositoryImplementation extends MySqlBaseRepository implements TimeSlotRepository
{
    /**
     * Find
     * 
     * @param string $timeSlot
     * 
     * @return Model
     */
    public function findByTimeSlot($timeSlot)
    {
        return TimeSlot::where("intervals", $timeSlot)->first();
    }
}
