<?php

namespace App\Repositories\MySql\User;

use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Repositories\MySql\MySqlBaseRepository;

class UserRepositoryImplementation extends MySqlBaseRepository implements UserRepository
{
    /**
     * Find By Mobile
     * 
     * @param int $mobile
     * 
     * @return array
     */
    public function findByMobile($mobile)
    {
        return User::where("mobile", $mobile)->first();
    }

    /**
     * Find User By Name
     * 
     * @param string $name
     * 
     * @return model
     */
    public function findByName($name)
    {
        return User::where("full_name", $name)->first();
    }
}
