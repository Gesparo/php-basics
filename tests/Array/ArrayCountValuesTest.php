<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 02.04.2018
 * Time: 8:53
 */

use PHPUnit\Framework\Error\Warning;
use PHPUnit\Framework\TestCase;

class ArrayCountValuesTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $expected
     * @param $array
     * @test
     */
    public function compare_expectations_with_result($expected, $array)
    {
        $this->assertEquals($expected, array_count_values($array));
    }

    public function dataProvider()
    {
        return [
            [
                [1 => 3, 2 => 3],
                [1, 1, 1, 2, 2, 2]
            ],
            [
                [1 => 2],
                [1, '1']
            ],
            [
                [2 => 2, 3 => 2],
                [2, '2', 3, '3']
            ],
            [
                ['русский' => 2],
                ['русский', 'русский']
            ],
        ];
    }

    /**
     * @test
     */
    public function function_can_not_count_bool_values()
    {
        $this->expectException(Warning::class);

        array_count_values([true, true, true]);
    }
}