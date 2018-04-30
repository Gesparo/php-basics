<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.04.2018
 * Time: 16:06
 */

use PHPUnit\Framework\TestCase;

class ArrayValuesTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @test
     */
    public function main_tests($expected, $array)
    {
        $this->assertSame($expected, array_values($array));
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
                [1, 2, 3]
            ],
            [
                [1, 2, 3],
                [3 => 1, 2, 3]
            ],
            [
                [1, 2, 3],
                ['some' => 1, 'foo' => 2, 'bar' => 3]
            ],
            [
                ['1', 2, 3],
                ['1', 2, 3]
            ],
        ];
    }
}