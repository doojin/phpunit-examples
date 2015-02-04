<?php

require_once 'MathUtil.php';

class MathUtilTest extends PHPUnit_Framework_TestCase
{
    public function test_add_ShouldReturnSumOfTwoPositiveNumbers()
    {
        $expected = 5.1;
        
        $result = MathUtil::add(1.1, 4);
        
        $this->assertEquals($expected, $result);
    }
    
    public function test_add_ShouldReturnSumOfTwoNegativeNumbers()
    {
        $expected = -5.1;
        
        $result = MathUtil::add(-1.1, -4);
        
        $this->assertEquals($expected, $result);
    }
}