<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 14.04.2018
 * Time: 9:18
 */

use PHPUnit\Framework\TestCase;

class ArrayKeysTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @test
     */
    public function main_tests($expected, $array)
    {
        $this->assertEquals($expected, array_keys($array));
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
                [0, 1, 2, 3],
                [1, 2, 3, 4]
            ],
            [
                ['foo', 'bar'],
                ['foo' => 1, 'bar' => 2]
            ]
        ];
    }

    /**
     * @test
     */
    public function search_keys()
    {
        $this->assertEquals([0, 1, 2], array_keys(['foo', 'foo', 'foo', 'bar'], 'foo'));
    }

    /**
     * @test
     */
    public function search_by_stict_mode()
    {
        $this->assertEquals([0], array_keys(['1', 1, true, 'bar'], '1', true));
    }
}