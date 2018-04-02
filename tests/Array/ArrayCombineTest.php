<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 01.04.2018
 * Time: 22:08
 */

use PHPUnit\Framework\Error\Warning;
use PHPUnit\Framework\TestCase;

class ArrayCombineTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $expected
     * @param $keysArray
     * @param $valuesArray
     * @test
     */
    public function different_values_test($expected, $keysArray, $valuesArray)
    {
        $this->assertEquals($expected, array_combine($keysArray, $valuesArray));
    }

    /**
     * Provider with main data
     *
     * @return array
     */
    public function dataProvider()
    {
        return [
            [
                [1 => 'd'],
                [1, '1', true],
                ['a', 'b', 'd']
            ],
            [
                ['a', 'b', 'd'],
                [0, 1, 2],
                ['a', 'b', 'd']
            ],

        ];
    }

    /**
     * @test
     */
    public function warning_if_elements_size_is_not_equal()
    {
        $this->expectException(Warning::class);

        $this->assertEquals(false, array_combine([0, 1, 2, 3], ['a', 'b']));
    }
}