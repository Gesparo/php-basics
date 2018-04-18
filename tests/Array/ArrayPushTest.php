<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 18.04.2018
 * Time: 8:42
 */

use PHPUnit\Framework\TestCase;

class ArrayPushTest extends TestCase
{
    /**
     * @test
     */
    public function add_single_value()
    {
        $array = [2];
        array_push($array, 3);
        $this->assertCount(2, $array);
        $this->assertArraySubset([1 => 3], $array);
    }

    /**
     * @test
     */
    public function add_several_values()
    {
        $array = [2];
        array_push($array, 3, 4);
        $this->assertCount(3, $array);
        $this->assertArraySubset([2 => 4], $array);
    }
}