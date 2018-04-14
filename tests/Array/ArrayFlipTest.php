<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 14.04.2018
 * Time: 8:06
 */

use PHPUnit\Framework\Error\Warning;
use PHPUnit\Framework\TestCase;

class ArrayFlipTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @test
     */
    public function main_tests($expected, $array)
    {
        $this->assertEquals($expected, array_flip($array));
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
                [1 => 'some', 2 => 'foo'],
                ['some' => 1, 'foo' => 2]
            ],
            [
                [1 => 1],
                [1, '1']
            ],
        ];
    }

    /**
     * @test
     */
    public function no_integer_or_string_throws_warning()
    {
        $this->expectException(Warning::class);

        array_flip(['foo' => (object)['some' => 1]]);
    }

    /**
     * @test
     */
    public function no_integer_or_string_will_be_ignored()
    {
        $this->expectException(Warning::class);

        $this->assertEquals([1, 7 => 2], array_flip([1, true, false, null, (object)[], [], 0.2, 2]));
    }
}