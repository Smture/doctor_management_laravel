<?php

namespace App\Repositories\Appointment;

use App\Repositories\BaseRepository;

interface AppointmentRepository extends BaseRepository
{
    /**
     * Check if timeslot is available 
     * 
     * @param int $doctorId
     * @param int $slotId
     * @param int $patientId
     * 
     * @return mixed
     */
    public function isTimeSlotAvailable($doctorId, $slotId, $patientId);

    /**
     * Create appointment 
     * 
     * @param int $doctorId
     * @param string $timeSlot
     * 
     * @return bool
     */
    public function createAppointment($doctorId, $patientId, $slotId, $status);
}
