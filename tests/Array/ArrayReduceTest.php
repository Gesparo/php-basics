<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.04.2018
 * Time: 18:36
 */

use PHPUnit\Framework\TestCase;

class ArrayReduceTest extends TestCase
{
    /**
     * @test
     */
    public function count_sum()
    {
        $array = [1, 2, 3];

        $this->assertEquals(6, array_reduce($array, function($carry, $item) {
            return $carry + $item;
        }, 0));
    }
}