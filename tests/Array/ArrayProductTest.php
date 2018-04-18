<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 18.04.2018
 * Time: 8:31
 */

use PHPUnit\Framework\TestCase;

class ArrayProductTest extends TestCase
{
    /**
     * @test
     */
    public function simple_test_to_show_that_everything_work()
    {
        $this->assertSame(6, array_product([1, 2, 3]));
    }
}