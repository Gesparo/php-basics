<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.04.2018
 * Time: 23:09
 */

use PHPUnit\Framework\TestCase;

class ArraySumTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @test
     */
    public function main_tests($expected, $array)
    {
        $this->assertSame($expected, array_sum($array));
    }

    /**
     * Main provider
     *
     * @return array
     */
    public function mainProvider()
    {
        return [
            [
                6,
                [1, 2, 3]
            ],
            [
                6,
                ['1', '2', '3']
            ],
            [
                5.2,
                [true, '1.2', '3']
            ],
            [
                0,
                ['some', 'foo', 'bar']
            ],
        ];
    }
}