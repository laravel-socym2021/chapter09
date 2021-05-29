<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function ミドルウェアを無効にしてactingAsで認証ユーザ設定()
    {
        $user = User::factory()->create(
            [
                'name' => 'Mike',
            ]
        );

        $response = $this->withoutMiddleware()
            ->actingAs($user)
            ->getJson('/api/user');

        $response->assertStatus(200);
        $response->assertJson(
            [
                'name' => 'Mike',
            ]
        );
    }

    /**
     * @test
     */
    public function ミドルウェアを無効にせずにactingAsで認証ユーザ設定()
    {
        $user = User::factory()->create(
            [
                'name' => 'Mike',
            ]
        );

        $response = $this->actingAs($user)
            ->getJson('/api/user');

        $response->assertStatus(401);
    }


    /**
     * @test
     */
    public function sanctum_actingAs()
    {
        Sanctum::actingAs(
            User::factory()->create(
                [
                    'name' => 'Mike',
                ]
            ),
            ['*']
        );

        $response = $this->getJson('/api/sanctum-user');

        $response->assertStatus(200);
        $response->assertJson(
            [
                'name' => 'Mike',
            ]
        );
    }
}
