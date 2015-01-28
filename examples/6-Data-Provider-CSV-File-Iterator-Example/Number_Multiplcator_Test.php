<?php

require_once 'CSV_File_Iterator.php';
require_once 'Number_Multiplicator.php';

class Number_Multiplicator_Test extends PHPUnit_Framework_TestCase
{
    public function data_provider()
    {
        return new CSV_File_Iterator('examples/6-Data-Provider-CSV-File-Iterator-Example/test_data.csv');
    }
    
    /**
     * @dataProvider data_provider
     */
    public function test__multiplicate__should_multiplicate_numbers_correctly($a, $b, $c, $expected_result)
    {
        $multiplicator = new Number_Multiplicator();
        $multiplicator->add_number($a);
        $multiplicator->add_number($b);
        $multiplicator->add_number($c);
        
        $actual_result = $multiplicator->multiplicate();
        
        $this->assertEquals($expected_result, $actual_result);
    }
}

?>