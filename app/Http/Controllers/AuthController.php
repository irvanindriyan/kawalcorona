<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Helpers\FunctionHelpers;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required|string|min:5|max:15|unique:users,username',
            ]);

            $data = array(
                'username' => $request->username,
                'email' => null,
                'password' => Hash::make('12345'),
            );

            User::create($data);

            return response()->json(
                FunctionHelpers::resOK('Register user successful'), 200);
        } catch (\Illuminate\Validation\ValidationException $e ) {
            return response()->json(
                FunctionHelpers::resErrorValidation($e), $e->status);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }

    public function login(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required|string|exists:users,username',
                'password' => 'required|string',
            ]);

            $getUser = User::where('username', $request->username);
            $user = $getUser->firstOrFail();

            if (!Hash::check($request->password, $user->password)) {
                return response()->json(
                    FunctionHelpers::resError('Invalid password', 422), 422);
            }

            $token = JWTAuth::fromUser($user);

            return response()->json(
                FunctionHelpers::resOK([
                    'message' => 'Login successful',
                    'token' => $token,
                ]), 200);
        } catch (\Illuminate\Validation\ValidationException $e ) {
            return response()->json(
                FunctionHelpers::resErrorValidation($e), $e->status);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }

    public function getUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(
                    Fungsi::resError('User not found !'), 422);
            }

            return response()->json(
                FunctionHelpers::resOK($user), 200);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }
}
