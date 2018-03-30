<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.03.2018
 * Time: 8:00
 */

use PHPUnit\Framework\TestCase;

class ArrayChangeKeyCaseTest extends TestCase
{
    /**
     * @test
     * @dataProvider lowerProvider
     * @param $processedArray
     * @param $resultArray
     */
    public function convert_into_lover_case($processedArray, $resultArray)
    {
        $this->assertEquals(array_change_key_case($processedArray), $resultArray);
    }    
    
    /**
     * @return array
     */
    public function lowerProvider()
    {
        return [
            [
                ['SOME' => 1, 'FOO' => 2, 'Bar' => 3, 'BaZz' => 4, 'akk' => 5],
                ['some' => 1, 'foo' => 2, 'bar' => 3, 'bazz' => 4, 'akk' => 5]
            ],
        ];
    }

    /**
     * @dataProvider upperProvider
     * @test
     * @param $processedArray
     * @param $resultArray
     */
    public function convert_to_upper_case($processedArray, $resultArray)
    {
        $this->assertEquals(array_change_key_case($processedArray, CASE_UPPER), $resultArray);
    }

    public function upperProvider()
    {
        return [
            [
                ['some' => 1, 'Foo' => 2, 'BAr' => 3, 'BaZz' => 4, 'aKK1' => 5],
                ['SOME' => 1, 'FOO' => 2, 'BAR' => 3, 'BAZZ' => 4, 'AKK1' => 5]
            ],
        ];
    }
}