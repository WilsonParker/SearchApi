<?php

namespace Tests\Unit;

use App\Service\NaverSearchApi;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

class ApiTest extends TestCase
{
    use CreatesApplication;

    public function testApi()
    {
        $service = new NaverSearchApi();
        $service->call();
    }
}
