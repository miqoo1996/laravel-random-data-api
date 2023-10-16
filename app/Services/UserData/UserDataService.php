<?php

namespace App\Services\UserData;

use Illuminate\Support\Collection;

class UserDataService extends BaseUserDataService
{
    public function getRandomUsers(int $limit = 1, int $requestsCount = 1): ?Collection
    {
        $data = [];

        try {
            $sortBy = 'name';

            $this->changeCurrentVersion(self::VERSION_1);

            for ($i = 1; $i <= $requestsCount; $i++) {
                $data = array_merge($data, $this->getClient()->fetchData($limit));
            }
        } catch (\Throwable) {
            $sortBy = 'type';

            $this->changeCurrentVersion(self::VERSION_2);

            for ($i = 1; $i <= $requestsCount; $i++) {
                $data = array_merge($data, $this->getClient()->fetchData($limit));
            }
        }

        return collect($data)->sortByDesc($sortBy);
    }
}
