<?php

namespace App\Services\Appointment;

use App\Repositories\Appointment\AppointmentRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Constants;
use App\Jobs\NotifyUser;
use App\Services\TimeSlot\TimeSlotService;
use App\Services\User\UserService;

class AppointmentService
{
    private $userService;

    private $appointmentRepository;

    private $timeSlotService;

    /**
     * Constructor
     *
     * @param AppointmentRepository $appointmentRepository
     * @param UserService $userService
     * @param TimeSlotService $timeSlotService
     *
     */
    public function __construct(
        AppointmentRepository $appointmentRepository,
        UserService $userService,
        TimeSlotService $timeSlotService
    ) {
        $this->appointmentRepository = $appointmentRepository;
        $this->userService = $userService;
        $this->timeSlotService = $timeSlotService;
    }

    /**
     * Book Appointments for patients
     * 
     * @param model $userDetails
     * @param string $doctorName
     * @param string $timeSlot
     * 
     * @return mixed
     */
    public function bookAppointment($userDetails, $doctorName, $timeSlot)
    {
        Log::info("Checking if the user is patient...");
        if (!$userDetails->role_id == Constants::$PATIENT_ROLE_ID) {
            throw new Exception("User is not a patient.");
        }

        Log::info("Validating Doctor info");
        $doctorDetails = $this->userService->findByName($doctorName);

        if (!$doctorDetails) {
            throw new Exception("Doctor not found.");
        }

        if ($doctorDetails->role_id == Constants::$DOCTOR_ROLE_ID) {

            Log::info("Checking if time-slot is available");
            $slotId = $this->timeSlotService->findByTimeSlot($timeSlot)->id;
            $availability = $this->isTimeSlotAvailable($doctorDetails->id, $slotId, $userDetails->id);

            if ($availability) {
                $confirmedSlot = $this->appointmentRepository->createAppointment($doctorDetails->id, $userDetails->id, $slotId, Constants::$BOOKED);
                $confirmedSlot->slot_time = $timeSlot;

                NotifyUser::dispatch($userDetails);
                return $confirmedSlot;
            } else {
                throw new Exception("Time Slot Already Booked.");
            }
        }
    }

    /**
     * Check if timeslot is available 
     * 
     * @param int $doctorId
     * @param string $timeSlot
     * @param int $patientId
     * 
     * @return mixed
     */
    public function isTimeSlotAvailable($doctorId, $slotId, $patientId)
    {
        $availability =  $this->appointmentRepository->isTimeSlotAvailable($doctorId, $slotId, $patientId);

        if (!$availability) {
            return true;
        }
        return false;
    }
}
