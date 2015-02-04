<?php

require_once 'CSVFileIterator.php';
require_once 'NumberMultiplier.php';

class NumberMultiplierTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return CSVFileIterator
     */
    public function data_provider()
    {
        return new CSVFileIterator('examples/6-Data-Provider-CSV-File-Iterator-Example/test_data.csv');
    }

    /**
     * @dataProvider data_provider
     * @param int|float $a
     * @param int|float $b
     * @param int|float $c
     * @param int|float $expectedResult
     */
    public function test_multiply_ShouldMultiplyNumbersCorrectly($a, $b, $c, $expectedResult)
    {
        $multiplier = new NumberMultiplier();
        $multiplier->addNumber($a);
        $multiplier->addNumber($b);
        $multiplier->addNumber($c);
        
        $actualResult = $multiplier->multiply();
        
        $this->assertEquals($expectedResult, $actualResult);
    }
}

?>