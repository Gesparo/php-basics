<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 05.04.2018
 * Time: 8:16
 */

use PHPUnit\Framework\TestCase;

class ArrayDiffKeyTest extends TestCase
{
    /**
     * @dataProvider mainDataProvider
     * @param $expected
     * @param $array1
     * @param $array2
     * @test
     */
    public function different_tests($expected, $array1, $array2)
    {
        $this->assertEquals($expected, array_diff_key($array1, $array2));
    }

    /**
     * Main data provider
     *
     * @return array
     */
    public function mainDataProvider()
    {
        return [
            [
                [3 => 4],
                [1, 2, 3, 4],
                [5, 6, 7]
            ],
            [
                [],
                ['some' => 1, 'foo' => 2],
                ['some' => 3, 'foo' => 4]
            ],
            // Два ключа пар key => value считаются равными только тогда, когда (string) $key1 === (string) $key2
            [
                [0 => 1],
                [1, 2, 3],
                ['1' => 3, '2' => 4]
            ],
            [
                [1 => [2, 2]],
                [[1, 1], [2, 2]],
                [[3, 3]]
            ],
        ];
    }
}