<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 14.04.2018
 * Time: 8:31
 */

use PHPUnit\Framework\TestCase;

class ArrayIntersectKeyTest extends TestCase
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
        $this->assertEquals($expected, array_intersect_key($array1, $array2));
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
                [1, 2, 3, 4],
                [5, 6, 7]
            ],
            [
                ['some' => 1, 'foo' => 2],
                ['some' => 1, 'foo' => 2],
                ['some' => 3, 'foo' => 4]
            ],
            // Два ключа пар key => value считаются равными только тогда, когда (string) $key1 === (string) $key2
            [
                [1 => 2, 3],
                [1, 2, 3],
                ['1' => 3, '2' => 4]
            ],
            [
                [[1, 1]],
                [[1, 1], [2, 2]],
                [[3, 3]]
            ],
        ];
    }
}