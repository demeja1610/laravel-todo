<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\Auth\LoginService;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $response = $this->loginService->login($credentials, (bool) $request->input('remember_me'));

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back()->withInput();
        }

        return redirect()->route('page.projects');
    }

    public function logout(Request $request) {
        $response = $this->loginService->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return redirect()->route('page.login');
    }
}
