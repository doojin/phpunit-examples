<?php

require_once 'NumberIncrementerTestData.php';
require_once 'NumberIncrementer.php';

class NumberIncrementerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return NumberIncrementerTestData
     */
    public function numberProvider()
    {
        return new NumberIncrementerTestData();
    }

    /**
     * @dataProvider numberProvider
     * @param int|float $number
     * @param int|float $expectedResult
     */
    public function test_increment_ShouldReturnIncrementedNumber($number, $expectedResult)
    {
        $actualResult = NumberIncrementer::increment($number);
        
        $this->assertEquals($expectedResult, $actualResult);
    }
}