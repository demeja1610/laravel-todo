<?php

namespace App\Services\Auth;

use Exception;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(array $credentials, $remember = false) : object
    {
        try {
            $canLogin = Auth::attempt($credentials, $remember);

            if (!$canLogin) {
                throw new Exception('Неверный email или пароль', 401);
            }

            return (object) [
                'message' => 'Вы успешно авторизованы',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function logout()
    {
        try {
            $success = Auth::logout();

            if (!$success) {
                throw new Exception('Не удалось выйти', 500);
            }

            return $success;
        } catch (Exception $ex) {
            return (object) [
                'error' => $ex->getMessage(),
                'code' => $ex->getCode(),
            ];
        }
    }
}
