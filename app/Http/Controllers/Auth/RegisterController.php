<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\Auth\LoginService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\RegisterService;

class RegisterController extends Controller
{
    private $registerService;
    private $loginService;

    public function __construct(
        RegisterService $registerService,
        LoginService $loginService
    ) {
        $this->registerService = $registerService;
        $this->loginService = $loginService;
    }

    public function index()
    {
        return view('pages\register');
    }

    public function register(RegisterRequest $request)
    {
        $credentials = $request->only(['name', 'email', 'password']);

        $response = $this->registerService->register($credentials);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back()->withInput();
        }

        $loggedIn = $this->loginService->login($credentials);

        if (isset($loggedIn->error)) {
            session()->flash('error', $response->error);
            return redirect()->back()->withInput();
        }

        return redirect()->route('page.projects');
    }
}
