<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.04.2018
 * Time: 19:21
 */

use PHPUnit\Framework\TestCase;

class ArraySliceTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @param $offset
     * @param $length
     * @param bool $preserveKeys
     * @test
     */
    public function main_tests($expected, $array, $offset, $length = null, $preserveKeys = false)
    {
        $this->assertSame($expected, array_slice($array, $offset, $length, $preserveKeys));
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
                [1, 2, 3],
                [1, 2, 3],
                0
            ],
            [
                [3],
                [1, 2, 3],
                -1
            ],
            [
                [2],
                [1, 2, 3],
                -2,
                1
            ],
            [
                [1, 2],
                [1, 2, 3],
                0,
                -1
            ],
            [
                [2 => 3],
                [1, 2, 3],
                -1,
                1,
                true
            ],
        ];
    }
}