<?php

namespace App\Services\UserData\Repositories;

interface UserDataInterface
{
    public function fetchData(int $limit = 1): array;
}
