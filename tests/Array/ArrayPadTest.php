<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 18.04.2018
 * Time: 8:19
 */

use PHPUnit\Framework\TestCase;

class ArrayPadTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @param $size
     * @param $value
     * @test
     */
    public function main_tests($expected, $array, $size, $value)
    {
        $this->assertSame($expected, array_pad($array, $size, $value));
    }

    /**
     * Main provider
     *
     * @return array
     */
    public function mainProvider()
    {
        return [
            // same amount of items will not change array
            [
                [1, 2, 3],
                [1, 2, 3],
                3,
                1
            ],
            [
                [1, 2, 3, 1, 1],
                [1, 2, 3],
                5,
                1
            ],
            // if negative size is the same as amount of items - nothing change
            [
                [1, 2, 3],
                [1, 2, 3],
                -3,
                1
            ],
            [
                [1, 1, 1, 2, 3],
                [1, 2, 3],
                -5,
                1
            ],
            // also nothing changed if size is less than array size
            [
                [1, 2, 3],
                [1, 2, 3],
                2,
                1
            ],
            // numeric array that starts not from beginning will NOT change its keys
            [
                [3 => 1, 2, 3],
                [3 => 1, 2, 3],
                3,
                1
            ],
            // assocciative also will NOT change keys
            [
                ['some' => 1, 'some1' => 2, 'some2' => 3],
                ['some' => 1, 'some1' => 2, 'some2' => 3],
                3,
                1
            ],
            [
                ['some' => 1, 'some1' => 2, 'some2' => 3, 1],
                ['some' => 1, 'some1' => 2, 'some2' => 3],
                4,
                1
            ],
        ];
    }
}