<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.04.2018
 * Time: 19:01
 */

use PHPUnit\Framework\TestCase;

class ArraySearchTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $needle
     * @param $haystack
     * @param bool $strict
     * @test
     */
    public function main_tests($expected, $needle, $haystack, $strict = false)
    {
        $this->assertSame($expected, array_search($needle, $haystack, $strict));
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
                0,
                1,
                [1, 2, 3]
            ],
            [
                'foo',
                1,
                ['foo' => 1, 2, 3]
            ],
            [
                0,
                1,
                ['1', 1, true]
            ],
            [
                2,
                1,
                [2, 'some', true]
            ],
            [
                2,
                true,
                ['1', 1, true],
                true
            ],
        ];
    }
}