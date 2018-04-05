<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 05.04.2018
 * Time: 8:26
 */

use PHPUnit\Framework\Error\Error;
use PHPUnit\Framework\TestCase;

class ArrayDiffTest extends TestCase
{
    /**
     * @dataProvider mainDataProvider
     * @param $expected
     * @param $array1
     * @param $array2
     * @test
     */
    public function diffenet_tests($expected, $array1, $array2)
    {
        $this->assertEquals($expected, array_diff($array1, $array2));
    }

    /**
     * Main data provider
     *
     * @return array
     */
    public function mainDataProvider()
    {
        return [
            [
                [2 => 3],
                [1, 2, 3],
                [1, 2]
            ],
            [
                [1],
                [1, 2, 3],
                [2, 3]
            ],
            [
                ['bar' => 2],
                ['foo' => 1, 'bar' => 2],
                ['foo' => 1, 'bar' => 3]
            ],
            [
                [],
                ['foo' => 1, 'bar' => 1],
                ['any' => 1]
            ],
        ];
    }

    /**
     * @test
     */
    public function can_not_work_with_multidimension_arrays()
    {
        $this->expectException(Error::class);

        array_diff([[1, 1], [2, 2]], [[1, 1], [3, 3]]);
    }
}