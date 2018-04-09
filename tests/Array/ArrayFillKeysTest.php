<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 05.04.2018
 * Time: 8:35
 */

use PHPUnit\Framework\TestCase;

class ArrayFillKeysTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $keys
     * @param $value
     * @test
     */
    public function main_test($expected, $keys, $value)
    {
        $this->assertEquals($expected, array_fill_keys($keys, $value));
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
                ['foo' => 1, 'bar' => 1],
                ['foo', 'bar'],
                1
            ],
            [
                ['1' => 1],
                ['1', 1, true],
                1
            ],
            [
                ['foo' => (object) [], 'bar' => (object) []],
                ['foo', 'bar'],
                (object) []
            ],
            // Comment is not actual http://php.net/manual/ru/function.array-fill-keys.php#108801
            [
                ['1' => 1],
                ['1'],
                1
            ],
        ];
    }
}