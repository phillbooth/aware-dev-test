<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Joke;
use App\Services\JokeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class JokeApiController
{
    private JokeService $jokeService;

    public function __construct(JokeService $jokeService)
    {
        $this->middleware('auth:sanctum'); 
        $this->jokeService = $jokeService;
    }

    public function index(): JsonResponse
    {
        $jokes = Joke::all();
        return response()->json($jokes);
    }

}
