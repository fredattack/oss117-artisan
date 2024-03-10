<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;


class ApiService
{
    /**
     * @param array $params
     * @return array|\Exception
     */
    public function fetchQuotes(array $params): array|\Exception
    {

        try {
            $url = config('api_service.api_url');
            $url .= $this->constructURLPath($params);

            return Http::get($url)->throw()->json();
        } catch (RequestException $e) {
            return $e;
        }

    }

    /**
     * @return array|\Exception
     */
    public function fetchCharacters(): array|\Exception
    {

        try {
            $url = config('api_service.api_url');

            return Http::get("{$url}/characters")->throw()->json();
        } catch (RequestException $e) {
            return $e;
        }
    }

    /**
     * @param array $params
     * @return string
     */
    public function constructURLPath(array $params): string
    {

        // Set default values
        $character = $params['character'] != 'null' ? $params['character'] : null;
        $number = $params['number'] != 'null' ? $params['number'] : 1;

        // Construct URL path based on available parameters
        if ($character) {
            return "/author/{$character}/{$number}";
        }

        return $number > 1 ? "/random/{$number}" : "/random";
    }
}
