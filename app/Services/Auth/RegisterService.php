<?php

namespace App\Services\Auth;

use App\Enum\RolesEnum;
use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function register(array $credentials): object
    {
        try {
            $credentials['password'] = Hash::make($credentials['password']);

            $user = new User($credentials);
            $user->remember_token = Str::random(10);

            $success = $user->save();
            $user->assignRole(RolesEnum::user['name']);

            if (!$success) {
                throw new Exception('Не удалось зарегистрироваться', 401);
            }

            return (object) [
                'message' => 'Вы успешно зарегистрированы',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
