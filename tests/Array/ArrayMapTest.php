<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 17.04.2018
 * Time: 21:34
 */

use PHPUnit\Framework\TestCase;

class ArrayMapTest extends TestCase
{
    /**
     * @test
     */
    public function simple_test()
    {
        $this->assertSame([2, 2], array_map(function($n) { return $n = 2; }, [1, 1]));
    }

    /**
     * @test
     */
    public function use_standart_functions()
    {
        $this->assertSame([true, true], array_map("is_numeric", [1, 1]));
    }

    /**
     * @test
     */
    public function few_array_will_add_to_function_step_by_step()
    {
        $this->assertSame([4, 6], array_map(function($n, $m) { return $n + $m; }, [1, 2], [3, 4]));
    }
}