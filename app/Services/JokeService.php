<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Models\Joke;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class JokeService
{
    private Client $client;

    /**
     * JokeService constructor.
     * 
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Fetch a joke from the external API and store it in the database.
     *
     * @throws GuzzleException
     * @throws \Exception
     */
    public function fetchAndStoreJoke(): void
    {
        DB::beginTransaction();

        try {
            $response = $this->client->request('GET', '', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['id'], $data['joke'])) {
                Joke::updateOrCreate(
                    ['joke_id' => $data['id']],
                    ['joke' => $data['joke']]
                );
            }

            DB::commit();
        } catch (GuzzleException $e) {
            DB::rollBack();
            Log::error('Failed to fetch joke: ' . $e->getMessage());
            throw $e;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Unexpected error: ' . $e->getMessage());
            throw $e;
        } finally {
            // Perform any necessary cleanup
        }
    }
}
