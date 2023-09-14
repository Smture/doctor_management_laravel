<?php

namespace App\Http\Controllers\api\v1\User;

use App\Http\Controllers\api\BaseApiController;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

class UserApiController extends BaseApiController
{
    /* @var UserService */
    private $userService;

    /**
     * Constructor.
     *
     * @param UserService $userService
     */
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    /**
     * Get Token
     * 
     * @param int $mobile
     * 
     * @return mixed
     */
    public function getToken($mobile)
    {
        Log::info("Checking if user exists.");
        $user = $this->userService->findByMobile($mobile);

        if ($user) {
            $token = JWTAuth::fromUser($user);
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Access Denied'], 403);
        }
    }
}