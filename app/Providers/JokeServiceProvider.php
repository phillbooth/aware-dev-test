<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\JokeService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Exception;

class JokeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        try {
            $this->app->singleton(JokeService::class, function ($app): JokeService {
                // Create a new Guzzle Client and inject it into JokeService
                $client = new Client(['base_uri' => 'https://icanhazdadjoke.com/']);
                return new JokeService($client);
            });
        } catch (Exception $e) {
            Log::error('Failed to register JokeService: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
