<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 17.04.2018
 * Time: 22:25
 */

use PHPUnit\Framework\TestCase;

class ArrayMergeTest extends TestCase
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
        $this->assertSame($expected, array_merge($array1, $array2));
    }

    /**
     * Main provider
     *
     * @return array
     */
    public function mainProvider() {
        return [
            [
                [1, 2, 3, 4, 5, 6],
                [1, 2, 3],
                [4, 5, 6]
            ],
            // numeric keys will be numbered from 0
            [
                [1, 2, 3, 4, 5, 6],
                [3 => 1, 2, 3],
                [4 => 4, 5, 6]
            ],
            // numeric keys will compare as integer and add as integer
            [
                [1, 2, 3, 4, 5, 6],
                [1 , 2, 3],
                ['1' => 4, '2' => 5, '3' => 6],
            ],
            // sting keys will be replaced
            [
                ['foo' => 2, 1, 2],
                ['foo' => 1, 1],
                ['foo' => 2, 2],
            ]
        ];
    }
}