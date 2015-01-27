<?php

require_once 'String_Concatenator.php';

class String_Concatenator_Test extends PHPUnit_Framework_TestCase
{
    public function string_provider()
    {
        return array(
            array('abc', 'def', 'ghi', 'abcdefghi'),
            array('123', '456', '789', '123456789'),
            array('abc', 'nil', '789', 'abcnil789')
        );
    }
    
    /**
     * @dataProvider string_provider
     */
    public function test__merge__should_merge_all_strings_correctly($str1, $str2, $str3, $expected_result)
    {
        $string_concatenator = new String_Concatenator();
        $string_concatenator->add_string($str1);
        $string_concatenator->add_string($str2);
        $string_concatenator->add_string($str3);
        
        $actual_result = $string_concatenator->merge();
        
        $this->assertEquals($expected_result, $actual_result);
    }
}

?>