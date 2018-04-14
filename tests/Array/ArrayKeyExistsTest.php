<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 14.04.2018
 * Time: 9:10
 */

use PHPUnit\Framework\TestCase;

class ArrayKeyExistsTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $value
     * @param $array
     * @test
     */
    public function main_tests($expected, $value, $array)
    {
        $this->assertEquals($expected, array_key_exists($value, $array));
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
                true,
                'some',
                ['some' => 1, 'foo' => 2]
            ],
            // isset() does not return TRUE for array keys that correspond to a NULL value, while array_key_exists() does.
            [
                true,
                'some',
                ['some' => null, 'foo' => 2]
            ],
            [
                true,
                '1',
                [1 => 1, 2]
            ],
            [
                true,
                1,
                ['1' => 1, 'foo' => 2]
            ],
            [
                false,
                'some',
                [['some' => 1, 'foo' => 2]]
            ],

        ];
    }
}