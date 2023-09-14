<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
    /**
     * Find By Mobile
     * 
     * @param int $mobile
     * 
     * @return array
     */
    public function findByMobile($mobile);

    /**
     * Find User By Name
     * 
     * @param string $name
     * 
     * @return model
     */
    public function findByName($name);

}