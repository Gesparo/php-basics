<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 31.03.2018
 * Time: 8:58
 */

use PHPUnit\Framework\Error\Warning;
use PHPUnit\Framework\TestCase;

class ArrayChunkTest extends TestCase
{
    /**
     * @dataProvider correctSizeProvider
     * @param $array
     * @param $size
     * @param $expectedFirstSize
     * @param $expectedLastSize
     * @test
     */
    public function split_with_correct_size($array, $size, $expectedFirstSize, $expectedLastSize)
    {
        $chunks = array_chunk($array, $size);
        $this->assertCount($expectedFirstSize, $chunks[0]);
        $this->assertCount($expectedLastSize, $chunks[ count($chunks) - 1]);
    }

    public function correctSizeProvider()
    {
        return [
            [[1,2,3,4], 2, 2, 2],
            [[1,2,3,4], 3, 3, 1],
            [[1,2,3,4], 1, 1, 1],
            [['some' => 1, 'some2' => 2, 'some3' => 3, 'some4' => 4], 2, 2, 2]
        ];
    }

    /**
     * @test
     */
    public function associative_array_converted_into_simple_array()
    {
        $chunks = array_chunk(['some' => 1, 'some2' => 2, 'some3' => 3, 'some4' => 4], 2);
        $this->assertArrayNotHasKey('some', $chunks[0]);
        $this->assertArrayNotHasKey('some2', $chunks[0]);
        $this->assertArrayNotHasKey('some3', $chunks[1]);
        $this->assertArrayNotHasKey('some4', $chunks[1]);
    }

    /**
     * @test
     */
    public function associative_aray_left_keys_if_flag_is_set()
    {
        $chunks = array_chunk(['some' => 1, 'some2' => 2, 'some3' => 3, 'some4' => 4], 2, true);
        $this->assertArrayHasKey('some', $chunks[0]);
        $this->assertArrayHasKey('some2', $chunks[0]);
        $this->assertArrayHasKey('some3', $chunks[1]);
        $this->assertArrayHasKey('some4', $chunks[1]);
    }

    /**
     * @test
     */
    public function throw_warning_if_chunk_size_less_than_1()
    {
        $this->expectException(Warning::class);
        array_chunk([1,2,3,4], 0);
    }

    /**
     * @test
     */
    public function show_warning_if_chunk_array_is_not_array()
    {
        $this->expectException(Warning::class);
        array_chunk('', 2);
    }

    /**
     * @test
     */
    public function return_empty_array_if_chunk_array_is_empty()
    {
        $chunks = array_chunk([], 1);
        $this->assertTrue( is_array($chunks) );
        $this->assertCount(0, $chunks);
    }
}
