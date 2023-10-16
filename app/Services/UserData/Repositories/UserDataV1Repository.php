<?php

namespace App\Services\UserData\Repositories;

use Exception;
use Illuminate\Support\Facades\Http;

class UserDataV1Repository implements UserDataInterface
{

    public function fetchData(int $limit = 1): array
    {
        $response = Http::get(config('random_api.randomuser.url'), ['results' => $limit]);

        if (!$response->successful()) {
            throw new Exception("Error.");
        }

        $result = [];

        $data = $response->json();

        foreach ($data['results'] as $item) {
            $result[] = [
                'name' => $item['name']['first'] . ' ' . $item['name']['last'],
                'phone' => $item['phone'],
                'email' => $item['email'],
                'country' => $item['location']['country'],
            ];
        }

        return $result;
    }

}
