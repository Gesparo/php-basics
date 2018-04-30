<?php

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.04.2018
 * Time: 16:11
 */

use PHPUnit\Framework\TestCase;

class CompactTest extends TestCase
{
    /**
     * @test
     */
    public function convert_values_into_array()
    {
        $var1 = 'some';
        $var2 = 1;
        $var3 = '1';

        $this->assertSame(['var1' => 'some', 'var2' => 1, 'var3' => '1'], compact('var1', 'var2', 'var3'));
    }
}