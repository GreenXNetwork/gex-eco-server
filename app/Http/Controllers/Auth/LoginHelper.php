<?php

namespace App\Http\Controllers\Auth;

use App\User;

/**
 * List static functions support login.
 */
class LoginHelper {

    /**
     * return token data (access_token, expires_in)
     */
    public static function login($loginProxy, $email, $password) {
        if (!$token = $loginProxy->attemptLogin($email, $password)) {
            return response()->json([
                'status' => 'error',
                'error' => 'Unauthorized',
            ], 401);
        }

        return $token;
    }

    /**
     * return json from token data with additional field, such as status and currentAuthority
     */
    public static function buildResponse($tokenData, $authority) {
        $data = array_merge([
            'status' => 'ok',
            'currentAuthority' => $authority,
        ], $tokenData);
        return response()->json($data);
    }
}