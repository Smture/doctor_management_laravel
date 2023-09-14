<?php

namespace App;

class Constants
{
    public static $timeSlotStatuses = [];

    public static $BOOKED = "booked";

    public static $ACTIVE = "active";

    public static $CANCELLED = "cancelled";

    public static $AVAILABLE = "available";

    public static $ADMIN_ROLE_ID = 1;
    public static $DOCTOR_ROLE_ID = 2;
    public static $PATIENT_ROLE_ID = 3;

    public static function init()
    {
        self::$timeSlotStatuses = [
            self::$BOOKED,
            self::$ACTIVE,
            self::$CANCELLED,
            self::$AVAILABLE
        ];
    }
}

Constants::init();