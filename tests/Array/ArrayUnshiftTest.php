<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.04.2018
 * Time: 23:26
 */

use PHPUnit\Framework\TestCase;

class ArrayUnshiftTest extends TestCase
{
    /**
     * @test
     */
    public function add_one_element()
    {
        $array = ['foo', 'bar'];

        array_unshift($array, 'baz');

        $this->assertSame(['baz', 'foo', 'bar'], $array);
    }

    /**
     * @test
     */
    public function add_few_elements()
    {
        $array = ['foo', 'bar'];

        array_unshift($array, 'baz', 'bat');

        $this->assertSame(['baz', 'bat', 'foo', 'bar'], $array);
    }
}