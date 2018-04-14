<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 14.04.2018
 * Time: 8:59
 */

use PHPUnit\Framework\TestCase;

class ArrayIntersectTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array1
     * @param $array2
     * @test
     */
    public function main_tests($expected, $array1, $array2)
    {
        $this->assertEquals($expected, array_intersect($array1, $array2));
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
                [1, 2],
                [1, 2, 3],
                [1, 2]
            ],
            [
                [1 => 2, 3],
                [1, 2, 3],
                [2, 3]
            ],
            [
                ['foo' => 1],
                ['foo' => 1, 'bar' => 2],
                ['foo' => 1, 'bar' => 3]
            ],
            [
                ['foo' => 1, 'bar' => 1],
                ['foo' => 1, 'bar' => 1],
                ['any' => 1]
            ],
            [
                [],
                ['foo' => 1, 'bar' => 1],
                ['any' => 3]
            ],
        ];
    }
}