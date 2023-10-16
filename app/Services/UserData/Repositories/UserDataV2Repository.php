<?php

namespace App\Services\UserData\Repositories;

use Exception;
use Illuminate\Support\Facades\Http;

class UserDataV2Repository implements UserDataInterface
{
    public function fetchData(int $limit = 1): array
    {
        $response = Http::get(config('random_api.boredapi.url') . '/activity');

        if (!$response->successful()) {
            throw new Exception("Error.");
        }

        $data = $response->json();

        $result = [];

        $result[] = [
            'activity' => $data['activity'],
            'type' => $data['type'],
            'participants' => $data['participants'],
            'price' => $data['price'],
            'link' => $data['link'],
            'key' => $data['key'],
            'accessibility' => $data['accessibility'],
        ] ;

        return $result;
    }

}
