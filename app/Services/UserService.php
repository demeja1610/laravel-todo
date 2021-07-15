<?php

namespace App\Services;

use Exception;
use App\Models\User;
use App\Repositories\UserRepository;

Class UserService {
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(string $q = null, int $paginate = null) {
        $users = $this->userRepository->users($q)->orderBy('name', 'desc');

        return $paginate ? $users->paginate($paginate) : $users->get();
    }

    public function block(int $user_id, int $current_user_id)
    {
        try {
            if ($user_id === $current_user_id) {
                throw new Exception('Вы не можете заблокировать сами себя', 403);
            }

            $user = User::byId($user_id)->first();

            if (!$user) {
                throw new Exception('Пользователь не найден', 404);
            }

            $user->is_banned = true;
            $success = $user->save();

            if (!$success) {
                throw new Exception('Не удалось заблокировать пользователя', 500);
            }

            return (object) [
                'message' => 'Пользователь успешно заблокирован',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function unblock(int $user_id)
    {
        try {
            $user = User::byId($user_id)->first();

            if (!$user) {
                throw new Exception('Пользователь не найден', 404);
            }

            $user->is_banned = false;
            $success = $user->save();

            if (!$success) {
                throw new Exception('Не удалось разблокировать пользователя', 500);
            }

            return (object) [
                'message' => 'Пользователь успешно разблокирован',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function destroy(int $user_id, int $current_user_id)
    {
        try {
            if ($user_id === $current_user_id) {
                throw new Exception('Вы не можете удалить сами себя', 403);
            }

            $user = User::byId($user_id)->first();

            if (!$user) {
                throw new Exception('Пользователь не найден', 404);
            }

            $success = $user->delete();

            if (!$success) {
                throw new Exception('Не удалось удалить пользователя', 500);
            }

            return (object) [
                'message' => 'Пользователь успешно удален',
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
