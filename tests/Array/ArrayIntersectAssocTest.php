<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 14.04.2018
 * Time: 8:19
 */

use PHPUnit\Framework\TestCase;

class ArrayIntersectAssocTest extends TestCase
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
        $this->assertEquals($expected, array_intersect_assoc($array1, $array2));
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
                ['b' => 'awesome'],
                ['a' => 'some', 'b' => 'awesome'],
                ['a' => 'foo', 'b' => 'awesome']
            ],
            [
                [1 => 2],
                [1, 2, 3, 4],
                [3, 2, 1]
            ],
            // Два значения пар key => value считаются равными только тогда, если (string) $elem1 === (string) $elem2
            [
                [1 => 2],
                [1, 2, 3],
                ['1' => '2']
            ],
            [
                [],
                [1, 2, 3],
                [3 => 1, 2, 3]
            ],
        ];
    }
}