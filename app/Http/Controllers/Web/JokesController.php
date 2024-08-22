<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Models\Joke;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JokesController extends Controller
{
    /**
     * Display a listing of the jokes.
     */
    public function index()
    {
        // Fetch all jokes
        $jokes = Joke::all();

        // Return the jokes view with the jokes data
        return view('jokes.index', compact('jokes'));
    }
}
