<?php

require_once 'Math_Util.php';

class Math_Util_Test extends PHPUnit_Framework_TestCase
{
    public function test_add_shouldReturnSumOfTwoPositiveNumbers()
    {
        $expected = 5.1;
        
        $result = Math_Util::add(1.1, 4);
        
        $this->assertEquals($expected, $result);
    }
    
    public function test_add_shouldReturnSumOfNegativeNumbers()
    {
        $expected = -5.1;
        
        $result = Math_Util::add(-1.1, -4);
        
        $this->assertEquals($expected, $result);
    }
}

?>