<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // Import the base Controller class
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * Class LogoutController
 *
 * This controller handles the logout process for authenticated users. 
 * It ensures that the user's session is invalidated and the CSRF token is regenerated 
 * to prevent CSRF attacks. After the user is logged out, they are redirected to the login page.
 */
class LogoutController extends Controller
{
    /**
     * Handle the logout process.
     *
     * @param  Request  $request  The current HTTP request object.
     * @return RedirectResponse  A redirect response to the login page.
     */
    public function logout(Request $request): RedirectResponse
    {
        // Cache control: Clear any user-specific cache
        Cache::flush();

        // Log out the user
        Auth::logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect('/login');
    }
}
