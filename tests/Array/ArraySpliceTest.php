<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.04.2018
 * Time: 22:57
 */

use PHPUnit\Framework\TestCase;

class ArraySpliceTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @param $offset
     * @param null $length
     * @param array $replacement
     * @test
     */
    public function main_tests($expected, $array, $offset, $length = null, $replacement = [])
    {
        array_splice($array, $offset, $length, $replacement);

        $this->assertSame($expected, $array);
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
                [1, 2, 3],
                [1, 2, 3],
                -1
            ],
            [
                [2],
                [1, 2, 3],
                0,
                3,
                [2]
            ],
            [
                [2, 1, 3, 4, 3],
                [1, 2, 3],
                0,
                2,
                [2, 1, 3, 4]
            ],
            [
                [1, 2, 1, 3, 4, 3],
                [1, 2, 3],
                -2,
                1,
                [2, 1, 3, 4]
            ],
            [
                [2, 1, 3, 4, 3],
                [1, 2, 3],
                0,
                -1,
                [2, 1, 3, 4]
            ],
        ];
    }
}