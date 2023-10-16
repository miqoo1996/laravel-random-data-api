<?php

namespace App\Services\UserData;

use App\Services\UserData\Repositories\UserDataInterface;
use App\Services\UserData\Repositories\UserDataV1Repository;
use App\Services\UserData\Repositories\UserDataV2Repository;
use Exception;

abstract class BaseUserDataService
{
    public const VERSION_1 = 'v1';
    public const VERSION_2 = 'v2';

    public function __construct(
        private UserDataV1Repository $dataV1Repository,
        private UserDataV2Repository $dataV2Repository,
        private string $currentVersion = self::VERSION_1
    ){}

    public function getCurrentVersion(): string
    {
        return $this->currentVersion;
    }

    public function changeCurrentVersion(string $currentVersion): self
    {
        $this->currentVersion = $currentVersion;

        return $this;
    }

    public function getClient() : UserDataInterface
    {
        return match($this->getCurrentVersion()) {
            self::VERSION_1 => $this->dataV1Repository,
            self::VERSION_2 => $this->dataV2Repository,
            default => throw new Exception("Wrong version was sent!"),
        };
    }
}
