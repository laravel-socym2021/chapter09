<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class WithoutMiddlewareTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @test
     */
    public function 全てのミドルウェアを無効()
    {
        $response = $this->getJson('/api/live');

        $response->assertStatus(200);
    }
}
