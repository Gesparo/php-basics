<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 18.04.2018
 * Time: 8:33
 */

use PHPUnit\Framework\TestCase;

class ArrayPopTest extends TestCase
{
    /**
     * @test
     */
    public function assert_that_element_is_extracted()
    {
        $array = [1, 2];
        $this->assertSame(2, array_pop($array));
    }

    /**
     * @test
     */
    public function assert_that_array_become_less()
    {
        $array = [1, 2];
        array_pop($array);
        $this->assertCount(1, $array);
    }

    /**
     * @test
     */
    public function if_array_is_empty_it_will_return_null()
    {
        $array = [];

        $this->assertNull(array_pop($array));
    }
}