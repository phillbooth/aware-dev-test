<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\JokeService;

class FetchJokes extends Command
{
    protected $signature = 'jokes:fetch';
    protected $description = 'Fetch a new joke from the API and store it in the database';

    private JokeService $jokeService;

    public function __construct(JokeService $jokeService)
    {
        parent::__construct();
        $this->jokeService = $jokeService;
    }

    public function handle()
    {
        try {
            $this->jokeService->fetchAndStoreJoke();
            $this->info('Joke fetched and stored successfully.');
        } catch (\Exception $e) {
            $this->error('Failed to fetch and store joke: ' . $e->getMessage());
        }
    }
    
}
