<?php

class OutputTest extends PHPUnit_Framework_TestCase
{
	public function test_OutputExpectationShouldNotFailForASingleString()
	{
		$this->expectOutputString('Hello, world!');
		
		echo 'Hello, world!';
	}
	
	public function test_OutputExpectationShouldNotFailForMultipleStrings()
	{
		$this->expectOutputString('HelloWorld');
		
		print 'Hello';
		echo 'World';
	}
	
	public function test_OutputExpectationShouldNotFailForMultipleOutputUsingCycle()
	{
		$this->expectOutputString('abc123efg');
		
		$stringArray = array('abc', '123', 'efg');
		foreach ($stringArray as $string) {
			echo $string;
		}
	}
	
	public function test_OutputRegexpExpectationShouldNotFail()
	{
		$this->expectOutputRegex('/^H.*ld\!$/');
		
		echo 'Hello, world!';
	}
	
	public function test_setOutputCallback_ShouldWorkCorrectly()
	{
		$this->setOutputCallback('OutputTest::customCallback');
		$this->expectOutputString('!H!e!l!l!o!,! !w!o!r!l!d!!');
		
		echo 'Hello, world!';
	}
	
	public static function customCallback($string)
	{
		$output = '';
		for ($i=0; $i<strlen($string); $i++) {
			$output .= '!' . $string[$i];
		}
		return $output;
	}
}