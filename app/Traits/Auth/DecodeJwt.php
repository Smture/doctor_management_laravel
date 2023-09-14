<?php

namespace App\Traits\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;

trait DecodeJwt
{
    /**
     * Decode JWT Token
     * 
     * @param string $token
     * 
     * @return
     */
    public function decodeJwt($token)
    {
        JWTAuth::setToken($token);

        try {
            $user = JWTAuth::toUser();
            return $user;
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'Error decoding token'], 500);
        }
    }
}
