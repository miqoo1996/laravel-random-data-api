<?php

namespace Tests\Unit;

use App\Services\UserData\Repositories\UserDataV1Repository;
use App\Services\UserData\Repositories\UserDataV2Repository;
use App\Services\UserData\UserDataService;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

class UserDataTest extends TestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        $this->createApplication();
    }

    private function getUserDataService(string $version) : UserDataService
    {
        return app(UserDataService::class)->changeCurrentVersion($version);
    }

    /**
     * A basic test example.
     */
    public function test_api_version_1_is_up_and_running(): void
    {
        $service = $this->getUserDataService(UserDataService::VERSION_1);

        $this->assertInstanceOf(UserDataV1Repository::class, $service->getClient());

        $this->assertGreaterThan(0, count($service->getClient()->fetchData()));
    }

    /**
     * A basic test example.
     */
    public function test_api_version_2_is_up_and_running(): void
    {
        $service = $this->getUserDataService(UserDataService::VERSION_2);

        $this->assertInstanceOf(UserDataV2Repository::class, $service->getClient());

        $this->assertGreaterThan(0, count($service->getClient()->fetchData()));
    }
}
