<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 02.04.2018
 * Time: 23:06
 */

use PHPUnit\Framework\Error\Error;
use PHPUnit\Framework\TestCase;

class ArrayDiffAssocTest extends TestCase
{
    /**
     * @dataProvider mainDataProvider
     * @param $expected
     * @param $array1
     * @param $array2
     * @test
     */
    public function different_tests($expected, $array1, $array2)
    {
        $this->assertEquals($expected, array_diff_assoc($array1, $array2));
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
                ['a' => 'some'],
                ['a' => 'some', 'b' => 'awesome'],
                ['a' => 'foo', 'b' => 'awesome']
            ],
            [
                [1, 2 => 3],
                [1, 2, 3],
                [3, 2, 1]
            ],
            // Два значения пар key => value считаются равными только тогда, если (string) $elem1 === (string) $elem2
            [
                [2 => 3],
                [1, 2, 3],
                ['1', '2', '5']
            ],
            [
                [],
                [1, 2, 3],
                [1, 2, 3]
            ],
        ];
    }

    /**
     * @test
     */
    public function can_not_work_with_multidimension_arrays()
    {
        $this->expectException(Error::class);

        array_diff_assoc([[1, 1], [2, 2]], [[1, 1], [3, 3]]);
    }
}