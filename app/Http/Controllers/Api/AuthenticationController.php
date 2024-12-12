<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ApiService;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $validator = $this->validateLoginRequest($request);

        if ($validator->fails()) {
            return $this->respondWithValidationError($validator->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->respondWithToken(Auth::user());
        }

        return $this->respondWithUnauthorized();
    }

    /**
     * Validate login request.
     */
    private function validateLoginRequest(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];

        return  Validator::make($request->all(), $rules);
    }

    /**
     * Handle successful login.
     */
    private function respondWithToken(User $user)
    {
        $localToken = $user->createToken('LocalAppToken');
        $expiresAt = now()->addHour();
        $localToken->token->expires_at = $expiresAt;
        $localToken->token->save();

        return response()->json([
            'success' => true,
            'local_token' => $localToken->accessToken,
            'expires_at' => $expiresAt,
            'name' => $user->name,
            'email' => $user->email
        ], 200);
    }

    /**
     * Handle validation errors.
     */
    private function respondWithValidationError($errors)
    {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $errors,
        ], 400);
    }

    /**
     * Handle unauthorized access.
     */
    private function respondWithUnauthorized()
    {
        return response()->json([
            'success' => false,
            'message' => 'Failed to authenticate locally. Invalid credentials.',
        ], 401);
    }
}
