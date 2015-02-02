<?php

class Output_Test extends PHPUnit_Framework_TestCase
{
	public function test_outputExpectationShouldNotFailForAString()
	{
		$this->expectOutputString('Hello, world!');
		
		echo 'Hello, world!';
	}
	
	public function test_outputExpectationShouldNotFailForMultipleStrings()
	{
		$this->expectOutputString('HelloWorld');
		
		print 'Hello';
		echo 'World';
	}
	
	public function test_outputExpectationShouldNotFailForOutputViaCycle()
	{
		$this->expectOutputString('abc123efg');
		
		$string_array = array('abc', '123', 'efg');
		foreach ($string_array as $string)
		{
			echo $string;
		}
	}
	
	public function test_outputRegexpExpectationShouldNotFail()
	{
		$this->expectOutputRegex('/^H.*ld\!$/');
		
		echo 'Hello, world!';
	}
	
	public function test_setOutputCallbackShouldWorkCorrectly()
	{
		$this->setOutputCallback('Output_Test::custom_callback');
		$this->expectOutputString('!H!e!l!l!o!,! !w!o!r!l!d!!');
		
		echo 'Hello, world!';
	}
	
	public static function custom_callback($string)
	{
		$output = '';
		for ($i=0; $i<strlen($string); $i++)
		{
			$output .= '!' . $string[$i];
		}
		return $output;
	}
}