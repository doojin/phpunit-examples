<?php

require_once 'Math_Util.php';

class Math_Util_Test extends PHPUnit_Framework_TestCase
{
    public function test__add__should_return_sum_of_two_positive_numbers()
    {
        $expected = 5.1;
        
        $result = Math_Util::add(1.1, 4);
        
        $this->assertEquals($expected, $result);
    }
    
    public function test__add__return_sum_of_two_negative_numbers()
    {
        $expected = -5.1;
        
        $result = Math_Util::add(-1.1, -4);
        
        $this->assertEquals($expected, $result);
    }
}

?>