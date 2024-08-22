<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return View
     */
    public function showLoginForm(): View
    {
        session()->regenerateToken(); // Regenerate CSRF token
        return view('auth.login');
    }

    /**
     * Handle an incoming login request.
     *
     * @param LoginUserRequest $request
     * @return RedirectResponse
     */
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('jokes');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        error_log('Logout CSRF token 1: ' . $request->input('_token'));
        // Log the user out
        Auth::logout();
        
        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        error_log('Logout CSRF token 2: ' . $request->input('_token'));
        // Redirect the user to the login page
        return redirect('/login');
    }

}
