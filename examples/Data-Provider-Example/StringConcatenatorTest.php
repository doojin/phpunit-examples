<?php

require_once 'StringConcatenator.php';

class StringConcatenatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function stringProvider()
    {
        return array(
            array('abc', 'def', 'ghi', 'abcdefghi'),
            array('123', '456', '789', '123456789'),
            array('abc', 'nil', '789', 'abcnil789')
        );
    }

    /**
     * @dataProvider stringProvider
     * @param string $str1
     * @param string $str2
     * @param string $str3
     * @param string $expectedResult
     */
    public function test_merge_ShouldMergeAllStringsCorrectly($str1, $str2, $str3, $expectedResult)
    {
        $stringConcatenator = new StringConcatenator();
        $stringConcatenator->addString($str1);
        $stringConcatenator->addString($str2);
        $stringConcatenator->addString($str3);
        
        $actualResult = $stringConcatenator->merge();
        
        $this->assertEquals($expectedResult, $actualResult);
    }
}