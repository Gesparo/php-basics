<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.04.2018
 * Time: 23:21
 */

use PHPUnit\Framework\TestCase;

class ArrayUniqueTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @param int $sortFlag
     * @test
     */
    public function main_tests($expected, $array, $sortFlag = SORT_STRING)
    {
        $this->assertSame($expected, array_unique($array, $sortFlag));
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
                [1, 2 => 2, 4 => 3],
                [1, 1, 2, 2, 3, 3]
            ],
            [
                ['1', 2 => '2', 4 => '3'],
                ['1', '1', '2', '2', '3', '3']
            ],
            [
                ['1', 2 => '2', 4 => '3'],
                ['1', '1', '2', '2', '3', '3'],
                SORT_NUMERIC
            ],
        ];
    }
}