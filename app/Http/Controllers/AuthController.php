<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UsersService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $usersService;
    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }


    // ---------------------------------------------------------------------------------
    // GET
    // ---------------------------------------------------------------------------------
    public function showRegister()
    {
        return view('auth.register');
    }
    public function showLogin()
    {
        return view('auth.login');
    }





    // ---------------------------------------------------------------------------------
    // POST
    // ---------------------------------------------------------------------------------
    public function register(RegisterRequest $request)
    {
        try {
            $this->usersService->register($request->validated());
            return redirect()->route('login')->with('success', 'Registration successful. Please login.');
        } catch (\Exception $e) {
            \Log::error('Registration Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Registration Error: ' . $e->getMessage()]);
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
