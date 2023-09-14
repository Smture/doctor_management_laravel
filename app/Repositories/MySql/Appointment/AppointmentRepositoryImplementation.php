<?php

namespace App\Repositories\MySql\Appointment;

use App\Models\Appointment;
use App\Repositories\MySql\MySqlBaseRepository;
use App\Repositories\Appointment\AppointmentRepository;
use App\Constants;
use Illuminate\Support\Facades\Log;

class AppointmentRepositoryImplementation extends MySqlBaseRepository implements AppointmentRepository
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
    public function isTimeSlotAvailable($doctorId, $slotId, $patientId)
    {
        $query = Appointment::where("doctor_id", $doctorId)
            ->where("patient_id", $patientId)
            ->where("slot_id", $slotId)
            ->whereIn("status", [Constants::$ACTIVE, Constants::$BOOKED])
            ->exists();

        return $query;
    }

    /**
     * Create appointment 
     * 
     * @param int $doctorId
     * @param string $timeSlot
     * 
     * @return bool
     */
    public function createAppointment($doctorId, $patientId, $slotId, $status)
    {
        return Appointment::create([
            "doctor_id" => $doctorId,
            "patient_id" => $patientId,
            "slot_id" => $slotId,
            "status" => $status
        ]);
    }
}
