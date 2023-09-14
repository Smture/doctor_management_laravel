<?php

namespace App\Repositories\TimeSlot;

use App\Repositories\BaseRepository;

interface TimeSlotRepository extends BaseRepository
{
    /**
     * Find
     * 
     * @param string $timeSlot
     * 
     * @return Model
     */
    public function findByTimeSlot($timeSlot);

}