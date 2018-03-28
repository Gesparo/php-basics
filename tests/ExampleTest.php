<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 28.03.2018
 * Time: 8:28
 */

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
}
