<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.04.2018
 * Time: 18:47
 */

use PHPUnit\Framework\TestCase;

class ArrayReverseTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @param bool $preserveKeys
     * @test
     */
    public function main_test_function($expected, $array, $preserveKeys = false)
    {
        $this->assertSame($expected, array_reverse($array, $preserveKeys));
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
                [3, 2, 1],
                [1, 2, 3]
            ],
            [
                [3, 2, 1],
                ['1' => 1, '2' => 2, 3]
            ],
            [
                [3, 2, 'foo' => 1],
                ['foo' => 1, 2, 3]
            ],
            [
                [2 => 3, 1 => 2, 0 => 1],
                [1, 2, 3],
                true
            ],
        ];
    }
}