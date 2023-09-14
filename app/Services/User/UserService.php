<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserService
{

    /**
     * Constructor
     *
     * @param UserRepository $userRepository
     *
     */
    public function __construct(
        UserRepository $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    private $userRepository;

    /**
     * Find User By Mobile
     * 
     * @param int $mobile
     * 
     * @return model
     */
    public function findByMobile($mobile)
    {
        return $this->userRepository->findByMobile($mobile);
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
        return $this->userRepository->findByName($name);
    }
}
