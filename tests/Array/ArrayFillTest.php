<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 09.04.2018
 * Time: 22:31
 */

use PHPUnit\Framework\Error\Warning;
use PHPUnit\Framework\TestCase;

class ArrayFillTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $startIndex
     * @param $numberOfItems
     * @param $value
     * @test
     */
    public function main_tests($expected, $startIndex, $numberOfItems, $value)
    {
        $this->assertEquals($expected, array_fill($startIndex, $numberOfItems, $value));
    }

    /**
     * @test
     */
    public function warning_if_num_is_less_zero()
    {
        $this->expectException(Warning::class);

        array_fill(0, -1, 1);
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
                [1, 1],
                0,
                2,
                1
            ],
            [
                [],
                0,
                0,
                1
            ],
            [
                [-1 => 1, 1],
                -1,
                2,
                1
            ],
            [
                [-2 => 1, 0 => 1],
                -2,
                2,
                1
            ],
        ];
    }
}