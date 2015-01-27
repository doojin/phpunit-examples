<?php

require_once 'Number_Incrementer_Test_Data.php';
require_once 'Number_Incrementer.php';

class Number_Incrementer_Test extends PHPUnit_Framework_TestCase
{
    public function number_provider()
    {
        return new Number_Incrementer_Test_Data();
    }
    
    /**
     * @dataProvider number_provider
     */
    public function test__increment__should_return_incremented_number($number, $expected_result)
    {
        $actual_result = Number_Incrementer::increment($number);
        
        $this->assertEquals($expected_result, $actual_result);
    }
}

?>