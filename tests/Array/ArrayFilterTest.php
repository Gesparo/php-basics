<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 11.04.2018
 * Time: 22:34
 */

use PHPUnit\Framework\TestCase;

class ArrayFilterTest extends TestCase
{
    /**
     * @dataProvider mainProvider
     * @param $expected
     * @param $array
     * @param $filterFunction
     * @param $flag
     * @test
     */
    public function main_tests($expected, $array, $filterFunction, $flag)
    {
        $this->assertEquals($expected, array_filter($array, $filterFunction,  $flag));
    }

    /**
     * convert to boolean type
     * @link http://php.net/manual/ru/language.types.boolean.php#language.types.boolean.casting
     *
     * @test
     */
    public function if_do_not_set_callback_function_it_will_remove_false_variants()
    {
        $this->assertEquals([7 => 1], array_filter([false, 0, 0.0, '', '0', [], null, 1]));
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
                [2 => 3],
                [1, 2, 3],
                function ($key) { return 2 === $key; },
                ARRAY_FILTER_USE_KEY
            ],
            [
                [],
                [1, 2, 3],
                function ($key) { return 3 === $key; },
                ARRAY_FILTER_USE_KEY
            ],
            [
                [1 => 2],
                [1, 2, 3],
                function ($value, $key) { return 2 === $value; },
                ARRAY_FILTER_USE_BOTH
            ],
            // use build-in functions
            [
                [1, 2, 3],
                [1, 2, 3],
                "is_int",
                ARRAY_FILTER_USE_KEY
            ],
            [
                [1, 2, 3],
                [1, 2, 3, 'foo' => 4],
                "is_int",
                ARRAY_FILTER_USE_KEY
            ],
            [
                [],
                [1, 2, 3],
                "is_null",
                ARRAY_FILTER_USE_KEY
            ],
        ];
    }
}