<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enum\PermissionsEnum;
use App\Services\UserService;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService =$userService;
    }

    public function index(Request $request) {
        Gate::authorize(PermissionsEnum::manage_users);

        $q = $request->input('q');
        $response = $this->userService->index($q, 20);

        if($response->isEmpty()) {
            return redirect()->route('page.users');
        }

        return view('pages.users', ['users' => $response]);
    }

    public function block(int $user_id, Request $request)
    {
        Gate::authorize(PermissionsEnum::manage_users);

        $currentUserId = $request->user()->id;
        $response = $this->userService->block($user_id, $currentUserId);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->back();
    }

    public function unblock(int $user_id)
    {
        Gate::authorize(PermissionsEnum::manage_users);

        $response = $this->userService->unblock($user_id);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->back();
    }

    public function destroy(int $user_id, Request $request)
    {
        Gate::authorize(PermissionsEnum::manage_users);

        $currentUserId = $request->user()->id;
        $response = $this->userService->destroy($user_id, $currentUserId);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);
        
        return redirect()->back();
    }
}
