<?php

namespace App\Http\Controllers\api\v1\Appointment;

use App\Http\Controllers\api\BaseApiController;
use App\Jobs\NotifyUser;
use Illuminate\Support\Facades\Log;
use App\Traits\Auth\DecodeJwt;
use App\Services\Appointment\AppointmentService;
use Illuminate\Http\Request;

class AppointmentApiController extends BaseApiController
{
    /* @var AppointmentService */
    private $appointmentService;

    /**
     * Constructor.
     *
     * @param AppointmentService $appointmentService
     */
    public function __construct(
        AppointmentService $appointmentService
    ) {
        $this->appointmentService = $appointmentService;
    }

    use DecodeJwt;

    /**
     * Book Appointment
     * 
     * @param Request $request
     * 
     * @return mixed
     */
    public function bookAppointment(Request $request)
    {
        Log::info("Fetching Request Data...");
        $authorizationHeader = $request->header('Authorization');
        $doctorName = $request->input('doctor_name');
        $timeSlot = $request->input('time_slot');

        Log::info("Removing Bearer...");
        $token = substr($authorizationHeader, 7);

        Log::info("Checking is token is valid...");
        $userDetails = $this->decodeJwt($token);

        if ($userDetails) {
            Log::info("Processing appointment request for user-id" . $userDetails->id);
            $appointmentResponse = $this->appointmentService->bookAppointment($userDetails, $doctorName, $timeSlot);

            if ($appointmentResponse) {
                
            }

            return $appointmentResponse;
        }
    }
}
