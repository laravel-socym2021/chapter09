<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use App\Http\Middleware\TeaPotMiddleware;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    /**
     * @test
     */
    public function live()
    {
        $this->getJson('/api/live')
            ->assertStatus(418);
    }

    /**
     * @test
     */
    public function TeaPotMiddlewareを無効()
    {
        $response = $this->withoutMiddleware(TeaPotMiddleware::class)
            ->getJson('/api/live');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function 全てのミドルウェアを無効()
    {
        $response = $this->withoutMiddleware()
            ->getJson('/api/live');

        $response->assertStatus(200);
    }
}
