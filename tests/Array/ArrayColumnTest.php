<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 31.03.2018
 * Time: 9:46
 */

use PHPUnit\Framework\TestCase;

class ArrayColumnTest extends TestCase
{
    /**
     * @dataProvider differentArraysProvider
     * @param $expected
     * @param $array
     * @param $columnName
     * @test
     */
    public function get_column_from_different_arrays($expected, $array, $columnName)
    {
        $this->assertEquals($expected, array_column($array, $columnName));
    }

    /**
     * Data provider
     *
     * @return array
     */
    public function differentArraysProvider()
    {
        return [
            [
                [1, 3],
                [
                    ['a' => 1, 'b' => 2],
                    ['a' => 3, 'b' => 4],
                ],
                'a'
            ],
            [
                [1, 3],
                [
                    ['символ' => 1, 'другой' => 2],
                    ['символ' => 3, 'другой' => 4],
                ],
                'символ'
            ],
            [
                [[1,1], [3,3]],
                [
                    ['a' => [1,1], 'b' => 2],
                    ['a' => [3,3], 'b' => 4],
                ],
                'a'
            ],
            [
                [1, 3],
                // array that was converted into stdClass
                // here you can read more about it: http://php.net/manual/ru/language.types.object.php#language.types.object.casting
                [
                    (object) ['a' => 1, 'b' => 2],
                    (object) ['a' => 3, 'b' => 4],
                ],
                'a'
            ],
            [
                [1, 1],
                [
                    [1, 2, 3],
                    [1, 2, 3],
                ],
                0
            ],
            [
                [1, 1],
                [
                    [1, 2, 3],
                    [1, 2, 3],
                ],
                '0'
            ],
            [
                [2, 2],
                [
                    [1, 2, 3],
                    [1, 2, 3],
                ],
                '1'
            ],
            [
                [
                    [1, 2, 3],
                    [1, 2, 3],
                ],
                [
                    [1, 2, 3],
                    [1, 2, 3],
                ],
                null
            ],
        ];
    }

    /**
     * @dataProvider indexProvider
     * @param $expected
     * @param $array
     * @param $columnName
     * @param $indexName
     * @test
     */
    public function get_result_with_new_key($expected, $array, $columnName, $indexName)
    {
        $this->assertEquals($expected, array_column($array, $columnName, $indexName));
    }

    /**
     * Index provider
     *
     * @return array
     */
    public function indexProvider()
    {
        return [
            [
                [2 => 1, 4 => 3],
                [
                    ['a' => 1, 'b' => 2],
                    ['a' => 3, 'b' => 4],
                ],
                'a',
                'b'
            ],
            [
                [2 => 1, 4 => 3],
                [
                    [100 => 1, 200 => 2],
                    [100 => 3, 200 => 4],
                ],
                100,
                200
            ],
            [
                [2 => 1, 4 => 3],
                // array that was converted into stdClass
                // here you can read more about it: http://php.net/manual/ru/language.types.object.php#language.types.object.casting
                [
                    (object) ['a' => 1, 'b' => 2],
                    (object) ['a' => 3, 'b' => 4],
                ],
                'a',
                'b'
            ],
            [
                [
                    2 => ['a' => 1, 'b' => 2],
                ],
                [
                    ['a' => 1, 'b' => 2],
                ],
                null,
                'b'
            ],
            [
                [
                    2 => ['a' => 1, 'b' => 2],
                    4 => ['a' => 3, 'b' => 4],
                ],
                [
                    ['a' => 1, 'b' => 2],
                    ['a' => 3, 'b' => 4],
                ],
                null,
                'b'
            ],
        ];
    }
}
