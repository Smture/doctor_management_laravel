<?php

namespace App\Services\TimeSlot;

use App\Repositories\Appointment\AppointmentRepository;
use App\Repositories\TimeSlot\TimeSlotRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class TimeSlotService
{
    private $timeSlotRepository;

    /**
     * Constructor
     *
     * @param TimeSlotRepository $timeSlotRepository
     *
     */
    public function __construct(
        TimeSlotRepository $timeSlotRepository
    ) {
        $this->timeSlotRepository = $timeSlotRepository;
    }


    /**
     * Find
     * 
     * @param string $timeSlot
     * 
     * @return Model
     */
    public function findByTimeSlot($timeSlot)
    {
        return $this->timeSlotRepository->findByTimeSlot($timeSlot);
    }
}
