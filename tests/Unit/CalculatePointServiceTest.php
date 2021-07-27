<?php

namespace Tests\Unit;

use App\Exceptions\PreconditionException;
use App\Services\CalculatePointService;
use PHPUnit\Framework\TestCase;

class CalculatePointServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function calcPoint_購入金額が0ならポイントは0()
    {
        $result = CalculatePointService::calcPoint(0);

        $this->assertSame(0, $result);
    }

    /**
     * @test
     */
    public function calcPoint_購入金額が1000ならポイントは10()
    {
        $result = CalculatePointService::calcPoint(1000);

        $this->assertSame(10, $result);
    }

    /**
     * @test
     * @dataProvider dataProvider_for_calcPoint
     */
    public function calcPoint(int $expected, int $amount)
    {
        $result = CalculatePointService::calcPoint($amount);

        $this->assertSame($expected, $result);
    }

    public function dataProvider_for_calcPoint()
    {
        return [
            '購入金額が0なら0ポイント' => [0, 0],
            '購入金額が999なら0ポイント' => [0, 999],
            '購入金額が1000なら10ポイント' => [10, 1000],
            '購入金額が9999なら99ポイント' => [99, 9999],
            '購入金額が10000なら200ポイント' => [200, 10000],
        ];
    }

    /**
     * @test
     */
    public function exception_try_catch()
    {
        try {
            throw new \InvalidArgumentException('message', 200);
        } catch (\Throwable $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
            $this->assertSame(200, $e->getCode());
            $this->assertSame('message', $e->getMessage());
        }
    }

    /**
     * @test
     */
    public function exception_expectException_method()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(200);
        $this->expectExceptionMessage('message');

        throw new \InvalidArgumentException('message', 200);
    }

    /**
     * @test
     */
    public function calcPoint_購入金額が負の数なら例外をスロー()
    {
        $this->expectException(PreconditionException::class);
        $this->expectExceptionMessage('購入金額が負の数');

        CalculatePointService::calcPoint(-1);
    }
}
