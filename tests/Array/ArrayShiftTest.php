<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.04.2018
 * Time: 19:07
 */

use PHPUnit\Framework\TestCase;

class ArrayShiftTest extends TestCase
{
    /**
     * @test
     */
    public function taking_first_element()
    {
        $array = ['foo', 'bar', 1];

        $this->assertSame('foo', array_shift($array));
        $this->assertCount(2, $array);
    }
}